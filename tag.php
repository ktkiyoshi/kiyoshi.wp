<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
    <div id="main">
        <div id="content">
            <section>
                <ul class="panels">
                    <li class="panel_title"><?php single_tag_title(); ?></li>
                </ul>
            </section>
            <?php
                $query_array = $wp_query->query_vars;
                $query_array['posts_per_page'] = 30;
                query_posts($query_array);
                $paginate_base = get_pagenum_link(1);
                if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged', '%#%');
                } else {
                    $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .user_trailingslashit('page/%#%/', 'paged');
                    $paginate_base .= '%_%';
                }
                $pagination = array('base' => $paginate_base,
                                    'format' => $paginate_format,
                                    'total' => $wp_query->max_num_pages,
                                    'mid_size' => 4,
                                    'current' => ($paged ? $paged : 1)
                                    );
                echo '<div class="page-navi">'."\n".paginate_links($pagination).'</div>'."\n";
            ?>
            <section>
            <?php while (have_posts()) : the_post(); ?>
                <article class="archive dump">
                    <header class="circle">
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate></time></li>
                            <li><?php the_time('Y') ?></li>
                            <li><?php the_time('m/d') ?></li>
                        </ul>
                    </header>
                    <div class="entry_info">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php edit_post_link(' - Edit', '<span class="admin">', '</span>'); ?></h1>
                        <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
                        <p class="tags"><?php the_tags('',''); ?></p>
                        <p class="read_more"><a href="<?php the_permalink(); ?>">続きを読む</a></p>
                    </div>
                </article>
            <?php endwhile; ?>
            </section>
            <?php
                echo '<div class="page-navi">'."\n".paginate_links($pagination).'</div>'."\n";
                wp_reset_query();
            ?>
        </div><!-- /#content -->
<?php get_sidebar(); ?>
        <div class="reset"></div>
    </div><!-- /#main -->
<?php get_footer(); ?>