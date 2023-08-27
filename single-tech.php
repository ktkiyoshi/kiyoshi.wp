<?php get_header(); ?>

<body>
    <?php require("parts/header_link.php"); ?>
    <div id="wrapper" class="tech">
        <div id="main">
            <div id="content" class="single">
                <section>
                    <p class="dashed mt10">
                        技術記事については、<a href="https://qiita.com/ktkiyoshi" target="_blank" class="tdu">Qiita</a>にも稀に投稿しています。
                    </p>
                </section>
                <article>
                    <header>
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                            <li> | 最終更新: <?php echo get_the_modified_date('Y/m/d (D) G:i') ?></li>
                            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p class="tags"><?php echo get_the_term_list($post->ID, 'tech_tag', ' '); ?></p>
                    </header>
                    <div class="entry">
                        <?php the_post();
                        the_content(); ?>
                    </div>
                    <?php require("parts/social_button.php"); ?>
                </article>
            </div><!-- /#content -->
        </div><!-- /#main -->
        <?php get_footer(); ?>