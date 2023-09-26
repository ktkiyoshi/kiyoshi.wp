<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <div id="content">
            <?php if (get_post_type() == 'tech') : ?>
                <section>
                    <p class="qiita_info">
                        技術記事については、<a href="https://qiita.com/ktkiyoshi" target="_blank" class="tdu">Qiita</a>にも稀に投稿しています。
                    </p>
                </section>
            <?php endif; ?>
            <article>
                <h1>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
                <section class="entry_meta">
                    <p class="postdate">
                        <time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate>
                            <?php the_time('Y/m/d (D) G:i') ?>
                        </time>
                    </p>
                    <p class="fa-icon categories">
                        <?php the_category(' ') ?>
                    </p>
                    <p>
                        <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?>
                    </p>
                </section>
                <section class="fa-icon tags">
                    <?php echo get_the_term_list($post->ID, 'tech_tag', ' '); ?>
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