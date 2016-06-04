<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
  <div id="main">
    <div id="content">
      <?php
        $query_array = $wp_query->query_vars;
        $query_array['posts_per_page'] = 5;
        $query_array['post_type'] = 'photo';
        query_posts($query_array);
        while (have_posts()) : the_post();
      ?>
      <article class="single">
        <header>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <ul class="entry_meta">
            <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
            <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
          </ul>
        </header>
        <div class="entry">
          <?php the_content(); ?>
        </div>
      </article>
      <?php
        endwhile;
        wp_reset_query();
      ?>
    </div><!-- /#content -->

<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
