<?php get_header(); ?>

<body>
    <?php require("parts/header_link.php"); ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <article class="single">
                    <header>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    </header>
                    <div class="entry">
                        <?php the_post();
                        the_content(); ?>
                    </div>
                    <?php require("parts/social_button.php"); ?>
                </article>
            </div><!-- /#content -->
            <?php get_sidebar(); ?>
            <div class="reset"></div>
        </div><!-- /#main -->
        <?php get_footer(); ?>