<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
    <div id="main">
        <div id="content">
            <section>
            <?php
                $query_array = $wp_query->query_vars;
                $query_array['posts_per_page'] = 10;
                $query_array['post_type'] = 'photo';
                query_posts($query_array);
                $paginate_base = get_pagenum_link(1);
                if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged', '%#%');
                } else {
                    $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .user_trailingslashit('page/%#%/', 'paged');
                    $paginate_base .= '%_%';
                }
                $pagination = array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 4,
                    'current' => ($paged ? $paged : 1)
                );
                while (have_posts()) : the_post();
            ?>
                <article class="single">
                    <header>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                            <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
                    </header>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php
                endwhile;
                echo '<div class="page-navi">'."\n".paginate_links($pagination).'</div>'."\n";
                wp_reset_query();
            ?>
            </section>
        </div><!-- /#content -->
<?php get_sidebar(); ?>
        <div class="reset"></div>
    </div><!-- /#main -->
<?php get_footer(); ?>