<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <?php get_sidebar(); ?>
        <div id="content">
            <section>
                <ul class="panels">
                    <li class="panel_title">
                        <?php if (is_post_type_archive('tech')) : ?>
                            <p>Tech</p>
                        <?php elseif (is_tag()) : ?>
                            <p><?php single_tag_title(); ?></p>
                        <?php elseif (is_year()) : ?>
                            <p><?php echo get_query_var('year') . '年'; ?></p>
                        <?php elseif (is_month()) : ?>
                            <p><?php echo get_query_var('year') . '年' . get_query_var('monthnum') . '月'; ?></p>
                        <?php endif; ?>
                    </li>
                </ul>
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
            ?>
            <section class="entries grid">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
                        <article>
                            <section class="thumbnail">
                                <a href=" <?php the_permalink() ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo catch_that_image(); ?>" />
                                </a>
                            </section>
                            <section class="entry_meta">
                                <p class="postdate">
                                    <time datetime="<?php the_time('Y/m/d H:i') ?>" pubdate>
                                        <?php the_time('Y/m/d H:i') ?>
                                    </time>
                                </p>
                                <h1>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h1>
                                <p class="description">
                                    <?php echo mb_strimwidth(get_the_excerpt(), 0, 70, "...", "UTF-8"); ?>
                                </p>
                            </section>
                        </article>

                <?php
                    endwhile;
                endif;
                ?>
            </section>
            <?php
            echo '<div class="page-navi">' . "\n" . paginate_links($pagination) . '</div>' . "\n";
            ?>
        </div><!-- /#content -->
    </main>
    <?php get_footer(); ?>