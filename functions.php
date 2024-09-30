<?php
// global $wp_rewrite;
// $wp_rewrite->flush_rules();

// セキュリティ対策
remove_action('wp_head', 'wp_generator'); // WordPressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head'); // 短縮URLのlink
remove_action('wp_head', 'wlwmanifest_link'); // ブログエディターのマニフェストファイル
remove_action('wp_head', 'rsd_link'); // 外部から編集するためのAPI
remove_action('wp_head', 'feed_links_extra', 3); // フィードへのリンク
remove_action('wp_head', 'print_emoji_detection_script', 7); // 絵文字に関するJavaScript
remove_action('wp_head', 'rel_canonical'); // カノニカル
remove_action('wp_print_styles', 'print_emoji_styles'); // 絵文字に関するCSS
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // 絵文字に関するJavaScript
remove_action('admin_print_styles', 'print_emoji_styles'); // 絵文字に関するCSS

// 抜粋の自動整形を無効化
remove_filter('the_excerpt', 'wpautop');

/* Don't change "" to ”” */
remove_filter('the_content', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');
remove_filter('the_title', 'wptexturize');

// WPによるURL推測を無効化
add_filter('redirect_canonical', 'disable_redirect_canonical');
function disable_redirect_canonical($redirect_url)
{
    if (is_404()) {
        return false;
    }
    return $redirect_url;
}

/* Delete header's bar */
add_filter('show_admin_bar', '__return_false');

/* Add CSS / JS */
add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script()
{
    // CSS
    wp_enqueue_style('default', get_template_directory_uri() . '/css/dist/default.min.css', array(), '1.0.0', '');
    wp_enqueue_style('navi', get_template_directory_uri() . '/css/dist/navi.min.css', array(), '1.0.0', '');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/dist/main.min.css', array(), '1.0.0', '');
    if ((is_page() || is_singular() || is_404()) && !is_page('gallery') && !is_page('note')) {
        wp_enqueue_style('single', get_template_directory_uri() . '/css/dist/single.min.css', array(), '1.0.0', '');
    }
    wp_enqueue_style('blogcard', get_template_directory_uri() . '/css/dist/blogcard.min.css', array(), '1.0.0', '');

    // 3rd vendor CSS
    wp_enqueue_style('awesome', get_template_directory_uri() . '/css/dist/font-awesome.min.css', array(), '1.0.0', '');
    wp_enqueue_style('source', '//fonts.googleapis.com/css?family=Monda|Source+Code+Pro', array(), '1.0.0', '');
    wp_enqueue_style('tomorrow', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/tomorrow-night-blue.min.css', array(), '1.0.0', '');

    // JS
    // wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '', true);
    // wp_enqueue_script('social_button', 'https://cdn.st-note.com/js/social_button.min.js', array(), '', true);
    // wp_enqueue_script('highlight', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"', array(), '', true);
}

/* Change main-loop setting */
function my_pre_get_posts($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    } elseif ($query->is_category()) {
        $query->set('posts_per_page', 30);
        return;
    } elseif ($query->is_archive()) {
        $query->set('posts_per_page', 30);
        return;
    }
}
add_action('pre_get_posts', 'my_pre_get_posts');

/* 外部リンク対応ブログカードのショートコードを作成 */
function show_Linkcard($atts) {
    extract(shortcode_atts(array(
        'url'=>"",
        'shorturl'=>"",
        'title'=>"",
        'excerpt'=>"",
        'image'=>""
    ),$atts));
    
    //画像サイズの横幅を指定
    $img_width ="170";
    //画像サイズの高さを指定
    // $img_height = "170";
    
    //OGP情報を取得
    require_once 'OpenGraph.php';
    $graph = OpenGraph::fetch($url);
    
    //OGPタグからタイトルを取得
    $Link_title = $graph->title;
    if(!empty($title)){
        $Link_title = $title; //title=""の入力がある場合はそちらを優先
    }
        
    //OGPタグからdescriptionを取得（抜粋文として利用）
    $Link_description = wp_trim_words($graph->description, 60, '…' );//文字数は任意で変更
    if(!empty($excerpt)){
        $Link_description = $excerpt; //値を取得できない時は手動でexcerpt=""を入力
    }
    
    //wordpress.comのAPIを利用してスクリーンショットを取得
    // $screenShot = 'https://s.wordpress.com/mshots/v1/'. urlencode(esc_url(rtrim( $url, '/' ))) .'?w='. $img_width .'&h='.$img_height.'';
    //画像を取得
    if(!empty($image)){
        // $xLink_img = '<img src="'. $screenShot .'" width="'. $img_width .'" />';
        $xLink_img = '<img src="'. $image .'" width="'. $img_width .'" />';
    } else {
        $xLink_img = '<img src="https://kt-kiyoshi.com/wp/images/nophoto.jpg" width="'. $img_width .'" />';
    }
    
    //ファビコンを取得（GoogleのAPIでスクレイピング）
    $host = parse_url($url)['host'];
    $searchFavcon = 'https://www.google.com/s2/favicons?domain='.$host;
    if($searchFavcon){
        $favicon = '<img class="favicon" src="'.$searchFavcon.'">';
    }
        
    //外部リンク用ブログカードHTML出力
    $sc_Linkcard = '';
    $sc_Linkcard .='
    <div class="blogcard ex">
    <a href="'. $shorturl .'" target="_blank">
     <div class="blogcard_thumbnail">'. $xLink_img .'</div>
     <div class="blogcard_content">
      <div class="blogcard_title">'. $Link_title .'</div>
      <div class="blogcard_excerpt">'. $Link_description .'</div>
      <div class="blogcard_link">'. $favicon .' '. $shorturl .' <i class="icon-external-link-alt"></i></div>
     </div>
    </a>
    </div>';    
    
    return $sc_Linkcard;    
}

//ショートコードに追加
add_shortcode("sc_Linkcard", "show_Linkcard");

/* Load other function files */
$function_files = [
    '/functions/custom-post.php',
    '/functions/utils.php',
];
foreach ($function_files as $file) {
    if ((file_exists(__DIR__ . $file))) { // ファイルが存在する場合
        // ファイルを読み込む
        locate_template($file, true, true);
    } else { // ファイルが見つからない場合
        // エラーメッセージを表示
        trigger_error("`$file`ファイルが見つかりません", E_USER_ERROR);
    }
}