<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <?php get_sidebar(); ?>
        <div id="content">
            <article class="latest">
                <?php
                $args = array(
                    'post_type' => 'post',
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
                                <time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate>
                                    <?php the_time('Y/m/d (D) G:i') ?>
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
                    'post_type' => 'post',
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
                                    <time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate>
                                        <?php the_time('Y/m/d (D) G:i') ?>
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
                <div class="panel_title">技術記事</div>
            </section>
            <section class="entries flex">
                <?php
                $args = array(
                    'post_type' => 'tech',
                    'posts_per_page' => 6
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
                                    <time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate>
                                        <?php the_time('Y/m/d (D) G:i') ?>
                                    </time>
                                </p>
                                <h1 class="index">
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
                                <time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate>
                                    <?php the_time('Y/m/d (D) G:i') ?>
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
            <section class="entries grid">
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
                                    <time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate>
                                        <?php the_time('Y/m/d (D) G:i') ?>
                                    </time>
                                </p>
                                <h1 class="index">
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