<?php
/*
Template Name: Galary
*/
?>

<?php get_header(); ?>
</head>
<div id="container">

  <div id="header">
    <div class="top_img">
      <a href="/wp"><img src="<?php echo image(); ?>" /></a>
    </div>
  </div>

<!--
  <div class="l_frame"><h1><?php the_title(); ?></h1></div>
-->
  <div id="center">
    <?php the_post();the_content(); ?>
  </div>

<?php get_footer(); ?>