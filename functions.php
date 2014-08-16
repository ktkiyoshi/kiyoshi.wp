<?php
/* Popular Entries Ranking on sidebar */
function popularRanking() {
  global $wpdb;
  $result = $wpdb->get_results("SELECT
    wp.ID,(ws.fb_like+ws.fb_share+ws.fb_comment+ws.tweet+ws.go_plus+ws.hatena) AS count,
    wp.post_date AS date, YEAR(wp.post_date) AS year, DATE_FORMAT(wp.post_date, '%m') AS month,
    DATE_FORMAT(wp.post_date, '%d') AS day, wp.post_name, wp.post_title, wp.post_content
    FROM wp_posts wp, wp_social ws
    WHERE wp.ID = ws.ID AND wp.post_type = 'post' AND wp.post_status = 'publish'
    ORDER BY count DESC, wp.post_date DESC LIMIT 5;");
  foreach ($result as $val) {
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $val->post_content, $matches);
    $tmp = array(
      'url' => get_template_directory_uri()."/".$val->year."/".$val->month."/".$val->day."/".$val->post_name,
      'post_title' => $val->post_title,
      'date' => $val->year."-".$val->month."-".$val->day,
      'image' => $matches[1][0],
      'count' => $val->count
      );
    $populars[$n] = $tmp;
    $n++;
  }
  return $populars;
}

function replaceImagePath($arg) {
  $content = str_replace('"/img/', '"' . get_bloginfo('template_directory') . '/img/', $arg);
  return $content;
}
add_action('the_content', 'replaceImagePath');


/* Delete header's bar */
add_filter( 'show_admin_bar', '__return_false' );

/* javascript */
function get_javascript_uri() {
  return $javascript_uri = get_template_directory_uri() . "/js/";
}

/* Header img */
function image(){
  $rdmimg = array();
  $rdmimg[0]=get_template_directory_uri() ."/img/header/image1_1000.png";
  $rdmimg[1]=get_template_directory_uri() ."/img/header/image2_1000.png";
  $rdmimg[2]=get_template_directory_uri() ."/img/header/image3_1000.png";
  $rdmimg[3]=get_template_directory_uri() ."/img/header/image4_1000.png";
  $rdmimg[4]=get_template_directory_uri() ."/img/header/image5_1000.png";
  $rdmimg[5]=get_template_directory_uri() ."/img/header/image6_1000.png";
  $rdmimg[6]=get_template_directory_uri() ."/img/header/image7_1000.png";
  return $rdmimg[rand(0,6)];
}

/* Super comments */
function super_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <?php printf(get_comment_author_link()) ?> |
    <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
    <?php endif; ?>
    <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a> |
    <?php edit_comment_link('Edit') ?>
    <?php comment_text() ?>
  </div>
<?php
}

function commentNumber($post_id) {
  global $wpdb;
  $query = "SELECT count(*) FROM wp_comments WHERE comment_post_ID = '$post_id'";
  return $wpdb->get_var($query);
}

function commentCloseDays() {
  global $wpdb;
  $query = "SELECT option_value FROM wp_options WHERE option_name = 'close_comments_days_old'";
  return $wpdb->get_var($query);
}


/* The first image */
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(empty($first_img)){
        $first_img = 'http://kt-kiyoshi.com/wp/images/nophoto.jpg';
    }
    return $first_img;
}

/* Delete [...] */
function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* Add support for WordPress 3.0's custom menus */
add_action( 'init', 'register_my_menu' );
/* Register area for custom menu */
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

/* Display page top via more link   */
function remove_more_jump_link($link) {
  $offset = strpos($link, '#more-');
  if ($offset) { $end = strpos($link, '"',$offset); }
  if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
  return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

/* Using category in wp_get_archives() */
function my_getarchives_category_where($where, $args){
    global  $wpdb;//データベース、テーブル関連の情報が入っているグローバル定数
    if (isset($args['cat'])){
        // 引数にcatと名前の付いた変数がカンマ区切りでセットされている場合、それぞれの数字を分割して配列$selectedCategoriesに格納する
        $selectedCategories = explode(',',$args['cat']);
        //それぞれの配列の数字が、負の場合=>$categoriesOutに、正の場合=>$categoriesInに、カンマ区切りで付け加える。
        foreach ($selectedCategories as $key) {
            if($key<0){
                    $categoriesOut .= abs($key).",";
            }else{
                    $categoriesIn .= abs($key).",";
            }
        }
        //それぞれの変数の最後の,文字を削除
        $categoriesIn = rtrim($categoriesIn,",");
        $categoriesOut = rtrim($categoriesOut,",");
        //$whereでSQLのwhere句を作成する。
        $where .= ' AND '.$wpdb->prefix.'posts.ID IN (SELECT DISTINCT ID FROM '.$wpdb->prefix.'posts'
                .' JOIN '.$wpdb->prefix.'term_relationships term_relationships ON term_relationships.object_id = '.$wpdb->prefix.'posts.ID'
                .' JOIN '.$wpdb->prefix.'term_taxonomy term_taxonomy ON term_taxonomy.term_taxonomy_id = term_relationships.term_taxonomy_id'
                .' WHERE term_taxonomy.taxonomy = \'category\'';
        if (!empty($categoriesIn)) {
            $where .= " AND term_taxonomy.term_id IN ($categoriesIn)";
        }
        if (!empty($categoriesOut)) {
            $where .= " AND term_taxonomy.term_id NOT IN ($categoriesOut)";
        }
        $where .= ')';
    }
    return $where;
}
if (function_exists('add_filter')){
    add_filter('getarchives_where', 'my_getarchives_category_where', 10, 2);
}

/* Usable Widgets */
if ( function_exists('register_sidebar') ) {
  register_sidebar();
}

/* Remove <p> */
remove_filter('the_content', 'wpautop');

/**
* @function get_archives_array
* @param post_type(string) / period(string) / year(Y) / limit(int)
* @return array
*/
if(!function_exists('get_archives_array')){
    function get_archives_array($args = ''){
        global $wpdb, $wp_locale;
        $defaults = array(
            'post_type' => '',
            'period'  => 'monthly',
            'year' => '',
            'limit' => ''
        );
        $args = wp_parse_args($args, $defaults);
        extract($args, EXTR_SKIP);
        if($post_type == ''){
            $post_type = 'post';
        }elseif($post_type == 'any'){
            $post_types = get_post_types(array('public'=>true, '_builtin'=>false, 'show_ui'=>true));
            $post_type_ary = array();
            foreach($post_types as $post_type){
                $post_type_obj = get_post_type_object($post_type);
                if(!$post_type_obj){
                    continue;
                }
                if($post_type_obj->has_archive === true){
                    $slug = $post_type_obj->rewrite['slug'];
                }else{
                    $slug = $post_type_obj->has_archive;
                }
                array_push($post_type_ary, $slug);
            }
            $post_type = join("', '", $post_type_ary);
        }else{
            if(!post_type_exists($post_type)){
                return false;
            }
        }
        if($period == ''){
            $period = 'monthly';
        }
        if($year != ''){
            $year = intval($year);
            $year = " AND DATE_FORMAT(post_date, '%Y') = ".$year;
        }
        if($limit != ''){
            $limit = absint($limit);
            $limit = ' LIMIT '.$limit;
        }
        $where  = "WHERE post_type IN ('".$post_type."') AND post_status = 'publish'{$year}";
        $join   = "";
        $where  = apply_filters('getarchivesary_where', $where, $args);
        $join   = apply_filters('getarchivesary_join' , $join , $args);
        if($period == 'monthly'){
                $query = "SELECT YEAR(post_date) AS 'year', MONTH(post_date) AS 'month', count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        }elseif($period == 'yearly'){
            $query = "SELECT YEAR(post_date) AS 'year', count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC $limit";
        }
        $key = md5($query);
        $cache = wp_cache_get('get_archives_array', 'general');
        if(!isset($cache[$key])){
            $arcresults = $wpdb->get_results($query);
            $cache[$key] = $arcresults;
            wp_cache_set('get_archives_array', $cache, 'general');
        }else{
            $arcresults = $cache[$key];
        }
        if($arcresults){
            $output = (array)$arcresults;
        }
        if(empty($output)){
            return false;
        }
        return $output;
    }
}
?>