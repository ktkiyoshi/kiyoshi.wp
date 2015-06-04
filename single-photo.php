<?php get_header(); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>

  <div class="main">
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
        <?php require("social_button.php"); ?>
      </article>
    </div><!-- /#topContent -->

<?php
 global $post;
 $args = array(
  'numberposts' => 10,
  'post_type' => 'photo', // Custom Post Name
  'post__not_in' => array($post->ID) //表示中の記事を除外
 );
?>
    <div id="content">
<?php $myPosts = get_posts($args); if($myPosts) : ?>
<?php foreach($myPosts as $post) : setup_postdata($post); ?>
      <article class="single">
        <div class="entry">
          <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
        </div>
        <ul class="entry_meta t_right mr20">
          <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
          <li>| <?php the_title(); ?></li>
          <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
        </ul>
      </article>

<?php endforeach; endif; wp_reset_postdata(); ?>

    </div><!-- /#content -->

<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
