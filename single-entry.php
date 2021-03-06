<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
    <div id="main">
        <div id="content">
            <ul class="pre-next">
                <li><?php previous_post_link('%link','<i class="fa fa-chevron-left" aria-hidden="true"></i>前の記事', false, ''); ?></li><!--
             --><li><?php next_post_link('%link','次の記事<i class="fa fa-chevron-right right" aria-hidden="true"></i>', false, ''); ?></li>
            </ul>
            <article class="single">
                <header>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <ul class="entry_meta">
                        <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                        <li>| <?php the_category(' | ') ?></li>
                        <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                    </ul>
                </header>
                <div class="entry">
                    <?php the_post();the_content(); ?>
                </div>
                <?php require("social_button.php"); ?>
            </article>
            <section class="clearfix">
                <ul class="panels">
                    <li class="panel_title"><a>関連記事</a></li>
                </ul>
                <?php
                    $categories = wp_get_post_categories($post->ID);
                    if ($categories) {
                        $args = array(
                            'category__in' => array($categories[0]),
                            'post__not_in' => array($post->ID),
                            'showposts' => 6,
                            'caller_get_posts' => 1,
                            'orderby' => 'rand'
                        );
                        $my_query = new WP_Query($args);
                        while ($my_query->have_posts()) : $my_query->the_post();
                ?>
                <article class="past_entries f_left t_center matchHeight">
                    <time datetime="<?php the_time('Y/m/d (D)') ?>" pubdate><?php the_time('Y/m/d (D)'); ?></time>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D" /></a>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </article>
                <?php
                        endwhile;
                        wp_reset_query();
                    }
                ?>
            </section>

            <section>
            <?php
                $pdate = strtotime(the_date('Y/m/d','','',false));
                $today = strtotime(date('Y/m/d'));
                $diff = ($today - $pdate) / ( 60 * 60 * 24);
                if (commentNumber($post->ID) > 0 || $diff < commentCloseDays()) {
            ?>
                <ul class="panels">
                    <li class="panel_title"><a><?php comments_number('コメント','コメント','コメント'); ?></a></li>
                </ul>
                <div class="l_frame">
                    <?php comments_template(); ?>
                </div>
            <?php
                }
            ?>
            </section>
        </div><!-- /#content -->
<?php get_sidebar(); ?>
        <div class="reset"></div>
    </div><!-- /#main -->
<?php get_footer(); ?>