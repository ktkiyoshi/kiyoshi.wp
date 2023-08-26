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

// 記事・抜粋の自動整形を無効化
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

/* Don't change "" to ”” */
remove_filter('the_content', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');
remove_filter('the_title', 'wptexturize');

// WPで自動挿入されるCSSを削除
// add_action('wp_enqueue_scripts', 'remove_auto_inserted_style');
// function remove_auto_inserted_style()
// {
//     wp_dequeue_style('wp-block-library');
//     wp_dequeue_style('wp-block-library-theme');
//     wp_dequeue_style('classic-theme-styles');
// }

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
    // stylesheet
    wp_enqueue_style('default', get_template_directory_uri() . '/css/dist/default.min.css', array(), '1.0.0', '');
    wp_enqueue_style('base', get_template_directory_uri() . '/css/dist/base.min.css', array(), '1.0.0', '');
    wp_enqueue_style('awesome', get_template_directory_uri() . '/css/dist/font-awesome.min.css', array(), '1.0.0', '');
    wp_enqueue_style('source', '//fonts.googleapis.com/css?family=Monda|Source+Code+Pro', array(), '1.0.0', '');
    if (get_post_type() == 'tech') {
        wp_enqueue_style('tech', get_template_directory_uri() . '/css/dist/tech.min.css', array(), '1.0.0', '');
    }
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/dist/responsive.min.css', array(), '1.0.0', '');
    wp_enqueue_style('tomorrow', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/tomorrow-night-blue.min.css', array(), '1.0.0', '');

    // javascript
    // wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '', true);
    // wp_enqueue_script('social_button', 'https://cdn.st-note.com/js/social_button.min.js', array(), '', true);
    // wp_enqueue_script('highlight', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"', array(), '', true);
}

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
