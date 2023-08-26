<?php
/* Enable to use Martdown for custom_post */
add_post_type_support('tech', 'wpcom-markdown');

/* Custom Post for TechBlog
   reference from http://qiita.com/nagasawaaaa/items/9501c0a2e544d85ee78d */
add_action('init', 'register_cpt_tech');
function register_cpt_tech()
{
    $labels = array(
        'menu_name' => __('技術記事', 'tech'),
        'name' => __('投稿一覧', 'tech'),
        'singular_name' => __('なぞラベル', 'tech'),
        'add_new' => __('新規追加', 'tech'),
        'add_new_item' => __('新規投稿を追加', 'tech'),
        'edit_item' => __('投稿の編集', 'tech'),
        'new_item' => __('New TechBlog', 'tech'),
        'view_item' => __('View TechBlog', 'tech'),
        'search_items' => __('Search TechBlog', 'tech'),
        'not_found' => __('No TechBlog found', 'tech'),
        'not_found_in_trash' => __('No TechBlog found in Trash', 'tech'),
        'parent_item_colon' => __('Parent TechBlog:', 'tech'),
    );
    $args = array(
        'labels' => $labels,
        'menu_position' => 5,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes'),
        // 技術用タグを使う(定義は、register_taxonomy参照)
        'taxonomies' => array('tech_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('tech', $args);

    /* Custom Taxonomy for TechBlog */
    register_taxonomy(
        'tech_tag',
        'tech',
        array(
            'label' => '技術タグ',
            'labels' => array(
                'all_items' => '技術タグ一覧',
                'add_new_item' => '新規技術タグを追加'
            ),
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false
        )
    );
}
