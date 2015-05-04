<?php get_header(); ?>
<?php query_posts("cat=80"); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div class="main">
    <div id="content">
      <?php while (have_posts()) : the_post(); $counter++; ?>
      <?php if ($counter < 10) { ?>
      <article class="single">
        <header>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <ul class="entry_meta">
            <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
            <li>| <?php the_category(' | ') ?></li>
            <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
          </ul>
        </header>
        <div class="entry_info">
          <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_A"/></a>
          <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
        </div>
      </article>
      <div class="reset"></div>
      <?php } else if ($counter == 10) { break; } endwhile; ?>
    <?php wp_reset_query(); ?>


      <article class="single">
        <header>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <ul class="entry_meta">
            <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
            <li>| <?php the_category(' | ') ?></li>
            <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
          </ul>
        </header>
        <div class="entry">
          <?php the_post();the_content(); ?>
        </div>
        <?php require("social_button.php"); ?>
      </article>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
