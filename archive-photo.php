<?php get_header(); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div class="main">
    <div id="content">
<?php
     $loop = new WP_Query(array("post_type" => "photo"));
     if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();
?>
      <article class="single">
          <header>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <ul class="entry_meta">
              <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
              <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
            </ul>
          </header>
        <div class="entry">
          <?php the_post();the_content(); ?>
        </div>
      </article>
<?php
      endwhile; endif;
?>
    </div><!-- /#content -->

<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
