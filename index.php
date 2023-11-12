<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <?php get_sidebar(); ?>
        <div id="content">
            <article class="latest">
                <?php
                $exclude_cat = get_category_by_slug('pokemon')->cat_ID;
                $args = array(
                    'post_type' => 'post',
                    'category__not_in' => $exclude_cat,
                    'posts_per_page' => 1
                );
                $wp_query = new WP_Query($args);
                ?>
                <?php
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) :
                        $wp_query->the_post();
                ?>
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
                                <?php echo mb_strimwidth(get_the_excerpt(), 0, 120, "...", "UTF-8"); ?>
                            </p>
                        </section>
                <?php
                    endwhile;
                endif;
                ?>
            </article>
            <section class="entries flex">
                <?php
                $exclude_cat = get_category_by_slug('pokemon')->cat_ID;
                $args = array(
                    'post_type' => 'post',
                    'category__not_in' => $exclude_cat,
                    'posts_per_page' => 10,
                    'offset' => 1
                );
                $wp_query = new WP_Query($args);
                ?>
                <?php
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) :
                        $wp_query->the_post();
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
                wp_reset_query();
                ?>
            </section>
            <section class="panels">
                <div class="panel_title">note</div>
            </section>
            <section class="entries flex">
                <?php
                $rss_items = my_note_feed('https://note.com/ktkiyoshi/rss', '12');
                foreach ($rss_items as $item) :
                    $eyecatch = $item->data["child"]["http://search.yahoo.com/mrss/"]["thumbnail"][0]["data"];
                ?>
                    <article>
                        <section class="thumbnail">
                            <a href=" <?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_title(); ?>">
                                <img src="<?php echo $eyecatch; ?>" />
                            </a>
                        </section>
                        <section class="entry_meta">
                            <p class="postdate">
                                <time datetime="<?php echo date("Y/m/d H:i", strtotime($item->get_date() . " +9 hour")); ?>" pubdate>
                                    <?php echo date("Y/m/d H:i", strtotime($item->get_date() . " +9 hour")); ?>
                                </time>
                            </p>
                            <h1>
                                <a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a>
                            </h1>
                            <p class="description">
                                <?php echo mb_strimwidth(strip_tags($item->get_description()), 0, 70, "...", "UTF-8"); ?>
                            </p>
                        </section>
                    </article>
                <?php endforeach; ?>
            </section>
            <section class="panels">
                <div class="panel_title">ポケモン記事</div>
            </section>
            <article class="latest">
                <?php
                $args = array(
                    'category_name' => 'pokemon',
                    'posts_per_page' => 1
                );
                $wp_query = new WP_Query($args);
                ?>
                <?php
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) :
                        $wp_query->the_post();
                ?>
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
                                <?php echo mb_strimwidth(get_the_excerpt(), 0, 120, "...", "UTF-8"); ?>
                            </p>
                        </section>
                <?php
                    endwhile;
                endif;
                ?>
            </article>
            <section class="entries flex">
                <?php
                $args = array(
                    'category_name' => 'pokemon',
                    'posts_per_page' => 6,
                    'offset' => 1
                );
                $wp_query = new WP_Query($args);
                ?>
                <?php
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) :
                        $wp_query->the_post();
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
                wp_reset_query();
                ?>
            </section>
        </div>
    </main>
    <?php get_footer(); ?>