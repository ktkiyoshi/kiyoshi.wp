<?php get_header(); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div class="main">
<?php
     $cnt = 1;
     $loop = new WP_Query(array("post_type" => "photo"));
     if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();
       if ($cnt == 1) {
?>
    <div id="topContent">
      <article class="single">
        <div class="entry">
          <?php the_post();the_content(); ?>
        </div>
        <ul class="entry_meta t_right mr20">
          <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
          <li>| <?php the_title(); ?></li>
          <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
        </ul>
      </article>
    </div><!-- /#topContent -->
<?php
       } else {
        if ($cnt == 2) {
?>
    <div id="content">
<?php
        }
?>
      <article class="single">
        <div class="entry">
          <?php the_post();the_content(); ?>
        </div>
        <ul class="entry_meta t_right mr20">
          <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
          <li>| <?php the_title(); ?></li>
          <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
        </ul>
      </article>
<?php
       }
      $cnt++;
      endwhile; endif;
?>
    </div><!-- /#content -->

<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
