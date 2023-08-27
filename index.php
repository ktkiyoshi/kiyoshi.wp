<?php get_header(); ?>

<body>
    <?php require("parts/header_link.php"); ?>
    <div id="wrapper">
        <main>
            <?php get_sidebar(); ?>
            <div id="content">
                <nav id="tabs">
                    <!-- <ul class="panels t_center">
                        <li class="panel_title">
                            <a href="#panel1"><i class="fa fa-pencil" aria-hidden="true"></i><span>ブログ</span></a>
                        </li>
                        <li class="panel_title">
                            <a href="#panel2"><i class="fa fa-trash" aria-hidden="true"></i><span>はきだめ日記</span></a>
                        </li>
                    </ul> -->
                    <div id="panel1" class="panel">
                        <?php
                        $query_array = $wp_query->query_vars;
                        $query_array['posts_per_page'] = 18;
                        query_posts($query_array);
                        ?>
                        <section>
                            <?php
                            while (have_posts()) : the_post();
                            ?>
                                <article class="matchHeight">
                                    <header>
                                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                        <ul class="entry_meta">
                                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                                            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                                        </ul>
                                    </header>
                                    <div class="entry_info t_center">
                                        <a href=" <?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D" /></a>
                                        <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 120, "...", "UTF-8"); ?></p>
                                        <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </section>
                        <?php
                        $paginate_base = get_pagenum_link(1);
                        if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                            $paginate_format = '';
                            $paginate_base = add_query_arg('paged', '%#%');
                        } else {
                            $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') . user_trailingslashit('page/%#%/', 'paged');
                            $paginate_base .= '%_%';
                        }
                        $pagination = array(
                            'base' => $paginate_base,
                            'format' => $paginate_format,
                            'total' => $wp_query->max_num_pages,
                            'mid_size' => 4,
                            'current' => ($paged ? $paged : 1)
                        );
                        echo '<div class="page-navi">' . "\n" . paginate_links($pagination) . '</div>' . "\n";
                        wp_reset_query();
                        ?>
                    </div>
                </nav>
            </div>
        </main>
    </div>
    <?php get_footer(); ?>