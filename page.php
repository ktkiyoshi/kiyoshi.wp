<?php get_header(); ?>

<body>
    <?php require("parts/header_link.php"); ?>
    <div id="wrapper">
        <div id="main">
            <div id="content" class="single">
                <article>
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
        </div><!-- /#main -->
    </div>
    <?php get_footer(); ?>