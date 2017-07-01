<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
<!--     <nav class="catNav">
        <ul class="fontAwesome">
            <li class="book"><a href="/wp/category/book">読 書</a></li>
            <li class="movie"><a href="/wp/category/movie">映 画</a></li>
            <li class="live"><a href="/wp/category/live">ライブ</a></li>
            <li class="travel"><a href="/wp/category/travel">旅 行</a></li>
            <li class="pokemon"><a href="/wp/category/pokemon">ポケモン</a></li>
        </ul>
    </nav> -->
    <div id="main">
        <div id="content">
        <?php
            $query_array = $wp_query->query_vars;
            $query_array['posts_per_page'] = 20;
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
            <section class="clearfix">
            <?php while (have_posts()) : the_post(); ?>
                <article class="index matchHeight">
                    <header>
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    </header>
                    <div class="entry_info">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D"/></a>
                        <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
                        <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
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