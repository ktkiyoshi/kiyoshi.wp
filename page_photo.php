<?php
/*
Template Name: Photo
*/
?>
<?php get_header(); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div id="main">
    <div id="content">
      <section>
<?php
　// function.phpを参照
  pageList('page_category', 'photo_diary');
?>
      </section>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
