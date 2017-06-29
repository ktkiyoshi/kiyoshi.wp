<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
    <div id="wrapper" class="dump">
        <div id="main">
            <div class="pre-next">
                <p><?php previous_post_link('%link','前の記事', false, ''); ?></p>
                <p><?php next_post_link('%link','次の記事', false, ''); ?></p>
            </div>
            <div id="content">
                <article class="single">
                    <header>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
                    </header>
                    <div class="entry">
                        <?php the_post();the_content(); ?>
                    </div>
                    <?php require("social_button.php"); ?>
                </article>
            </div><!-- /#content -->
        </div>
<?php get_footer(); ?>