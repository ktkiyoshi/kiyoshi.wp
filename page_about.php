<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>
</head>

<div id="container">
  <div id="header">
  <?php require('menu.php'); ?>
  </div>

  <div id="left">
    <?php
      $posts = get_posts('numberposts=5&category_name=about&order=ASC');
      global $post;
      if($posts): foreach($posts as $post): setup_postdata($post);
    ?>
    <div class="l_frame"><h1><?php the_title(); ?></h1></div>
    <div class="l_frame"><?php the_content(); ?></div>
    <?php endforeach; endif; ?>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>