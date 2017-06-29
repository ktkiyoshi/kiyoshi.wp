<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
    <div id="main">
        <div id="topContent">
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
        </div><!-- /#topContent -->
        <?php
            $args = array(
                'showposts' => 10,
                'post_type' => 'photo',
                'post__not_in' => array($post->ID)
            );
            $my_query = new WP_Query($args);
        ?>
        <div id="content">
            <section class="clearfix">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <article class="index matchHeight">
                    <header>
                        <ul class="entry_meta">
                            <li><a href="<?php the_permalink(); ?>"><strong class="fs_105"><?php the_title(); ?></strong></a></li>
                            <li><time datetime="<?php the_time('Y/m/d (D)') ?>" pubdate><?php the_time('Y/m/d (D)') ?></time></li>
                            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
                    </header>
                    <div class="entry_info">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D"/></a>
                        <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 100, "...", "UTF-8"); ?></p>
                        <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_query();
            ?>
            </section>
            <p class="category_more"><a href="/wp/category/dump">はきだめ日記をもっと見る</a></p>
        </div><!-- /#content -->
<?php get_sidebar(); ?>
        <div class="reset"></div>
    </div><!-- /#main -->
<?php get_footer(); ?>