<?php
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

/* Header img of index */
function image_index(){
  $rdmimg = array();
  $rdmimg[0]=get_template_directory_uri() ."/img/top-img.png";
  return $rdmimg[rand(0,5)];
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
    <?php edit_comment_link('[Edit]') ?>
    <?php comment_text() ?>
  </div>
<?php
        }

/* The first image */
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
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
?>