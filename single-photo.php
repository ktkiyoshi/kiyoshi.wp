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
      'numberposts' => 10,
      'post_type' => 'photo', // Custom post name
      'post__not_in' => array($post->ID) // Except current post
      );
      $my_query = new WP_Query($args);
    ?>
    <div id="content">
    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <article class="single">
        <div class="entry">
          <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
        </div>
        <ul class="entry_meta t_right mr20">
          <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
          <li>| <?php the_title(); ?></li>
          <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
        </ul>
      </article>
    <?php
      endwhile;
      wp_reset_query();
    ?>
    </div><!-- /#content -->

<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
