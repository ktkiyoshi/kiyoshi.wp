<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
  <div id="main">
    <div id="content">
      <section>
        <ul class="panels">
          <li class="panel_title"><a><?php echo get_query_var('year').'年'.get_query_var('monthnum').'月'; ?></a></li>
        </ul>
        <?php
          $query_array = $wp_query->query_vars;
          $query_array['posts_per_page'] = 31;
          $query_array['orderby'] = 'date';
          $query_array['order'] = 'ASC';
          query_posts($query_array);
          while (have_posts()) : the_post();
        ?>
        <article class="index">
          <header>
            <ul class="entry_meta">
              <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
              <li> | 最終更新: <?php echo get_the_modified_date('Y/m/d (D) G:i') ?></li>
              <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
            </ul>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </header>
          <div class="entry_info">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_B"/></a>
            <p class="tags"><?php echo get_the_term_list( $post->ID,'tech_tag',' ' ); ?></p>
            <p class="description_B"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
            <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
          </div>
          <div class="reset"></div>
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