<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <div id="content">
            <article>
                <h1>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
                <section class="entry_meta">
                    <p class="postdate">
                        <time datetime="<?php the_time('Y/m/d H:i') ?>" pubdate>
                            <?php the_time('Y/m/d H:i') ?>
                        </time>
                    </p>
                    <p>
                        <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?>
                    </p>
                </section>
                <section class="entry">
                    <?php the_post();
                    the_content(); ?>
                </section>
                <?php require_once("parts/social_button.php"); ?>
            </article>
        </div><!-- /#content -->
    </main>
    <?php get_footer(); ?>