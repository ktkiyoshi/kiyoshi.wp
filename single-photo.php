<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper" class="photo">
    <div id="main">
        <div id="content">
            <ul class="pre-next">
                <li><?php previous_post_link('%link','<i class="fa fa-chevron-left" aria-hidden="true"></i>前の写真', false, ''); ?></li><!--
             --><li><?php next_post_link('%link','次の写真<i class="fa fa-chevron-right right" aria-hidden="true"></i>', false, ''); ?></li>
            </ul>
            <article class="single">
                <div class="entry">
                    <?php the_post();the_content(); ?>
                </div>
                <ul class="entry_meta t_right mr20">
                    <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                    <li>| <?php the_title(); ?></li>
                    <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                </ul>
                <?php require("social_button.php"); ?>
            </article>
            <p class="category_more"><a href="/wp/photo/">写真日記一覧を見る</a></p>
        </div>
        <!-- /#content -->
<?php get_sidebar(); ?>
        <div class="reset"></div>
    </div><!-- /#main -->
<?php get_footer(); ?>