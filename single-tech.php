<?php get_header(); ?>
<body>
<?php require("header_parts_tech.php"); ?>
<div id="wrapper">
  <div id="main">
    <div id="content">
      <article class="single">
        <header>
          <ul class="entry_meta">
            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
            <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
          </ul>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <p class="tags"><?php echo get_the_term_list( $post->ID,'tech_tag',' ' ); ?></p>
        </header>
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
