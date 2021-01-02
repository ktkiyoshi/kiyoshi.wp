<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
    <div id="main">
        <div id="content">
            <section>
                <?php
                    $query_array = $wp_query->query_vars;
                    $query_array['posts_per_page'] = 100;
                    $query_array['orderby'] = 'date';
                    query_posts($query_array);
                    while (have_posts()) : the_post();
                ?>
                <article class="index matchHeight">
                    <header>
                        <ul class="entry_meta">
                            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                        </ul>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    </header>
                    <div class="entry_info">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D"/></a>
                        <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
            </section>
        </div><!-- /#content -->
<?php get_sidebar(); ?>
        <div class="reset"></div>
    </div><!-- /#main -->
<?php get_footer(); ?>