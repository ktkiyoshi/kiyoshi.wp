<?php get_header(); ?>
<?php query_posts("cat=-58"); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>

  <div id="main">
    <div id="content">
      <!-- <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/title_013_l.png" class="top_img"></a> -->
      <nav id="tabs">
        <ul class="panels t_center">
          <li class="panel_title"><a href="#panel1">最新記事</a></li>
          <li class="panel_title"><a href="#panel2">技術記事</a></li>
          <li class="panel_title"><a href="#panel3">読書記事</a></li>
        </ul>

        <div id="panel1" class="panel">
          <?php while (have_posts()) : the_post(); $counter++; ?>
          <?php if ($counter < 10) { ?>
          <article class="index">
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
              <p class="description_A"><?php echo mb_substr(get_the_excerpt(),0,100);?>...</p>
              <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </div>
          </article>
          <div class="reset"></div>
          <?php } else if ($counter == 10) { break; } endwhile; ?>
        </div>
        <?php wp_reset_query(); ?>

      <section>
        <div id="panel2" class="panel">
        <?php global $post; $mypost = get_posts( array( 'numberposts' => 10, 'category' => 58 ));?>
        <?php foreach( $mypost as $post ) : setup_postdata($post); ?>
          <article class="index mb20">
            <header>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <ul class="entry_meta">
                <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
                <li>| <?php the_category(' | ') ?></li>
                <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
              </ul>
            </header>
            <div class="entry_info">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_B f_left"/></a>
              <p class="description_B"><?php echo mb_substr(get_the_excerpt(),0,100);?>...</p>
              <p class="entry_more ml215"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </div>
          </article>
          <div class="reset"></div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        </div>
      </section>

      <section>
        <div id="panel3" class="panel">
        <?php global $post; $mypost = get_posts( array( 'numberposts' => 10, 'category' => 26 ));?>
        <?php foreach( $mypost as $post ) : setup_postdata($post); ?>
          <article class="index mb20">
            <header>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <ul class="entry_meta">
                <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
                <li>| <?php the_category(' | ') ?></li>
                <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
              </ul>
            </header>
            <div class="entry_info">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_B f_left"/></a>
              <p class="description_B"><?php echo mb_substr(get_the_excerpt(),0,100);?>...</p>
              <p class="entry_more ml215"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </div>
          </article>
          <div class="reset"></div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        </div>
      </section>

      </nav>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
