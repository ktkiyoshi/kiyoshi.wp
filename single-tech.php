<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper" class="tech">
  <div id="main">
    <div id="content">
      <article class="single">
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
        </div>
        <div class="entry">
          <?php the_post();the_content(); ?>
        </div>
        <?php require("social_button.php"); ?>
      </article>
    </div><!-- /#content -->

<?php get_sidebar('tech'); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
