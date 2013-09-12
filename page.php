<?php get_header(); ?>
</head>

<div id="container">
  <div id="header">
  <?php require('menu.php'); ?>
  </div>

  <div id="left">
    <div class="l_frame"><h1><?php the_title(); ?></h1></div>
      <?php the_post();the_content(); ?>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>