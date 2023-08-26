<?php get_header(); ?>

<body>
    <?php require("parts/header_link.php"); ?>
    <div id="wrapper">
        <div id="main">
            <div id="content" class="single">
                <article>
                    <header>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                            <li>| <?php the_category(' | ') ?></li>
                            <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
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