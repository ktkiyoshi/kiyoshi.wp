<?php
/* 外部リンク対応ブログカードのショートコードを作成 */
function show_Linkcard($atts) {
    extract(shortcode_atts(array(
        'url'=>"",
        'title'=>"",
        'excerpt'=>""
    ),$atts));
    
    //画像サイズの横幅を指定
    $img_width ="170";
    //画像サイズの高さを指定
    $img_height = "170";
    
    //OGP情報を取得
    require_once 'OpenGraph.php';
    $graph = OpenGraph::fetch($url);
    
    //OGPタグからタイトルを取得
    $Link_title = $graph->title;
    if(!empty($title)){
        $Link_title = $title;//title=""の入力がある場合はそちらを優先
    }
        
    //OGPタグからdescriptionを取得（抜粋文として利用）
    $Link_description = wp_trim_words($graph->description, 60, '…' );//文字数は任意で変更
    if(!empty($excerpt)){
        $Link_description = $excerpt;//値を取得できない時は手動でexcerpt=""を入力
    }
    
    //wordpress.comのAPIを利用してスクリーンショットを取得
    $screenShot = 'https://s.wordpress.com/mshots/v1/'. urlencode(esc_url(rtrim( $url, '/' ))) .'?w='. $img_width .'&h='.$img_height.'';
    //スクリーンショットを表示
    $xLink_img = '<img src="'. $screenShot .'" width="'. $img_width .'" />';
    
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
    <a href="'. $url .'" target="_blank">
     <div class="blogcard_thumbnail">'. $xLink_img .'</div>
     <div class="blogcard_content">
      <div class="blogcard_title">'. $Link_title .'</div>
      <div class="blogcard_excerpt">'. $Link_description .'</div>
      <div class="blogcard_link">'. $favicon .' '. $url .' <i class="icon-external-link-alt"></i></div>
     </div>
     <div class="clear"></div>
    </a>
    </div>';    
    
    return $sc_Linkcard;    
}
add_shortcode("sc_Linkcard", "show_Linkcard");

/* ブログカード風のAmazonアフィリエイトのショートコードを作成 */
function show_AmazonAffiliate($atts) {
    extract(shortcode_atts(array(
        'url'=>"",
        'shorturl'=>"",
        'title'=>"",
        'image'=>""
    ),$atts));
    
    //画像サイズの横幅を指定
    $img_width ="170";
    //画像サイズの高さを指定
    // $img_height = "170";
    
    // 商品名（OGP取得は重いため一旦手動）
    $Link_title = $title;
    
    //画像を取得
    if(!empty($image)){
        $Link_img = '<img src="'. $image .'" width="'. $img_width .'" />';
    } else {
        $Link_img = '<img src="https://kt-kiyoshi.com/wp/images/nophoto.jpg" width="'. $img_width .'" />';
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
     <div class="blogcard_thumbnail">'. $Link_img .'</div>
     <div class="blogcard_content">
      <div class="blogcard_title">'. $Link_title .'</div>
      <div class="blogcard_link">'. $favicon .' '. $shorturl .' <i class="icon-external-link-alt"></i></div>
     </div>
    </a>
    </div>';    
    
    return $sc_Linkcard;    
}
add_shortcode("sc_AmazonAffiliate", "show_AmazonAffiliate");