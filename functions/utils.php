<?php

/* The first image */
function catch_that_image($type = null)
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();

    $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);

    if ($output) {
        $first_img = $matches[1][0];
    } else {
        $first_img = 'https://kt-kiyoshi.com/wp/images/nophoto.jpg';
    }
    return $first_img;
}

/**
 * @function get_archives_array
 * @param post_type(string) / period(string) / year(Y) / limit(int)
 * @return array
 */
function get_archives_array($args = '')
{
    global $wpdb, $wp_locale;
    $defaults = array(
        'post_type' => '',
        'period'  => 'monthly',
        'year' => '',
        'limit' => ''
    );
    $args = wp_parse_args($args, $defaults);
    extract($args, EXTR_SKIP);
    if ($post_type == '') {
        $post_type = 'post';
    } elseif ($post_type == 'any') {
        $post_types = get_post_types(array('public' => true, '_builtin' => false, 'show_ui' => true));
        $post_type_ary = array();
        foreach ($post_types as $post_type) {
            $post_type_obj = get_post_type_object($post_type);
            if (!$post_type_obj) {
                continue;
            }
            if ($post_type_obj->has_archive === true) {
                $slug = $post_type_obj->rewrite['slug'];
            } else {
                $slug = $post_type_obj->has_archive;
            }
            array_push($post_type_ary, $slug);
        }
        $post_type = join("', '", $post_type_ary);
    } else {
        if (!post_type_exists($post_type)) {
            return false;
        }
    }
    if ($period == '') {
        $period = 'monthly';
    }
    if ($year != '') {
        $year = intval($year);
        $year = " AND DATE_FORMAT(post_date, '%Y') = " . $year;
    }
    if ($limit != '') {
        $limit = absint($limit);
        $limit = ' LIMIT ' . $limit;
    }
    $where  = "WHERE post_type IN ('" . $post_type . "') AND post_status = 'publish'{$year}";
    $join   = "";
    $where  = apply_filters('getarchivesary_where', $where, $args);
    $join   = apply_filters('getarchivesary_join', $join, $args);
    if ($period == 'monthly') {
        $query = "SELECT YEAR(post_date) AS 'year', MONTH(post_date) AS 'month', count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
    } elseif ($period == 'yearly') {
        $query = "SELECT YEAR(post_date) AS 'year', count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC $limit";
    }
    $key = md5($query);
    $cache = wp_cache_get('get_archives_array', 'general');
    if (!isset($cache[$key])) {
        $arcresults = $wpdb->get_results($query);
        $cache[$key] = $arcresults;
        wp_cache_set('get_archives_array', $cache, 'general');
    } else {
        $arcresults = $cache[$key];
    }
    if ($arcresults) {
        $output = (array)$arcresults;
    }
    if (empty($output)) {
        return false;
    }
    return $output;
}

/* get note RSS */
function my_note_feed($feedURL, $num)
{
    if (!$feedURL) {
        return false;
    }
    if (!$num) {
        $num = 6;
    }
    include_once(ABSPATH . WPINC . '/feed.php');
    $rss = fetch_feed($feedURL);
    if (!is_wp_error($rss)) {
        $maxitems = $rss->get_item_quantity($num);
        $rss_items = $rss->get_items(0, $maxitems);
    }
    if (!empty($maxitems)) {
        if ($maxitems == 0) {
            echo '<!-- RSSデータがありませんでした -->';
        } else {
            return $rss_items;
        }
    }
}

/* OGP tag */
function custom_ogp() {
  // フロントページ、ホーム、または個別ページの場合にOGPタグを出力
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    // 記事＆固定ページの場合
    if( is_singular() ) { 
       setup_postdata($post);
       $ogp_title = $post->post_title; 
       $ogp_descr = mb_substr(get_the_excerpt(), 0, 100); // 記事を100文字抜粋
       $ogp_url = get_permalink(); 
       wp_reset_postdata();
    // トップページの場合
    } elseif ( is_front_page() || is_home() ) { 
       $ogp_title = get_bloginfo('name'); 
       $ogp_descr = get_bloginfo('description'); 
       $ogp_url = home_url(); // サイトのURL
    }

    // 共通のOGPタグ設定
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    if ( is_singular() && has_post_thumbnail() ) {
       $ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
       $ogp_img = $ps_thumb[0]; 
    } else {
       $ogp_img = 'https://kt-kiyoshi.com/wp/images/nophoto.jpg'; //アップロードしたOGP画像のURLを入力
    }

    // OGPタグのアウトプット
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $insert .= '<meta name="twitter:site" content="@ktkiyoshi" />' . "\n";//Xのアカウント名を入力
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";
    // FacebookのOGPタグ設定
    // $insert .= '<meta property="fb:app_id" content="FBのappID">' . "\n";//FacebookのappIDを入力

    echo $insert;
  }
} // END custom_ogp

// headにOGPタグを出力するアクションを追加
add_action('wp_head','custom_ogp');