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

/* Register widget areas */
add_action('widgets_init', 'kiyoshi_register_widget_areas');
function kiyoshi_register_widget_areas()
{
    register_sidebar(array(
        'name'          => __('サイドバー・バナー', 'kiyoshi'),
        'id'            => 'sidebar-banner',
        'description'   => __('サイドバーに表示する固定バナー。画像ウィジェットやカスタムHTMLを追加してください。', 'kiyoshi'),
        'before_widget' => '<div id="%1$s" class="sidebar_banner_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ));
}

/* Customizer options */
add_action('customize_register', 'kiyoshi_customize_sidebar_banner');
function kiyoshi_customize_sidebar_banner($wp_customize)
{
    $wp_customize->add_section('kiyoshi_sidebar_banner_section', array(
        'title'    => __('サイドバー・バナー', 'kiyoshi'),
        'priority' => 160,
    ));

    $wp_customize->add_setting('sidebar_banner_title', array(
        'default'           => __('バナー', 'kiyoshi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('sidebar_banner_title', array(
        'label'   => __('バナーセクションのタイトル', 'kiyoshi'),
        'section' => 'kiyoshi_sidebar_banner_section',
        'type'    => 'text',
    ));
}

if (!function_exists('render_rmobile_banner')) {
    /**
     * Output the reusable sidebar banner section.
     */
    function render_rmobile_banner($extra_classes = '')
    {
        $sidebar_banner_title = get_theme_mod('sidebar_banner_title', __('バナー', 'kiyoshi'));

        $classes = ['sidebar_banner'];
        if (!empty($extra_classes)) {
            if (!is_array($extra_classes)) {
                $extra_classes = preg_split('/\s+/', (string) $extra_classes);
            }
            foreach ($extra_classes as $class_name) {
                $class_name = trim((string) $class_name);
                if ($class_name === '') {
                    continue;
                }
                $classes[] = sanitize_html_class($class_name);
            }
        }
        $classes = array_unique(array_filter($classes));

        ?>
        <section class="<?php echo esc_attr(implode(' ', $classes)); ?>">
            <div class="side_title">
                <p><?php echo esc_html($sidebar_banner_title); ?></p>
            </div>
            <?php if (is_active_sidebar('sidebar-banner')) : ?>
                <?php dynamic_sidebar('sidebar-banner'); ?>
            <?php else : ?>
                <p class="banner_placeholder"><?php esc_html_e('外観 > ウィジェット からバナーを設定してください。', 'kiyoshi'); ?></p>
            <?php endif; ?>
        </section>
        <?php
    }
}

/* Load other function files */
$function_files = [
    '/functions/custom-post.php',
    '/functions/utils.php',
    '/functions/blog-card.php',
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
