<?php get_header(); ?>
<?php query_posts("cat=-58"); ?>
<?php require_once('instagram.php'); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div id="main">
    <div id="content">
      <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/title_013_l.png" class="top_img"></a>
      <nav id="tabs">
        <ul class="panels">
          <li class="panel_title"><a href="#panel1">最新記事</a></li>
        </ul>

        <div id="panel1" class="panel">
          <?php while (have_posts()) : the_post(); $counter++; ?>
          <?php if ($counter <= 1) { ?>
          <article class="index">
            <header>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <ul class="entry_meta">
                <li><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></li>
                <li>| <?php the_category(' | ') ?></li>
                <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
              </ul>
            </header>
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_A f_left"/></a>
            <p class="description"><?php echo mb_substr(get_the_excerpt(),0,100);?>...</p>
            <p class="entry_more ml215"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
          </article>
          <div class="reset"></div>
          <p class="read_past_entries"><a href="" id="old_entry">&raquo;過去の記事</a></p>

          <div id="box_entry" style="display:none">
          <?php }else{ ?>
            <?php if ($counter == 10) { ?>
            <div class="count10">
            <?php } ?>
            <article class="past_entries f_left t_center">
              <time datetime="<?php the_time('Y-m-d (D)') ?>" pubdate><?php the_time('Y-m-d (D)') ?></time>
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_B" /></a>
              <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </article>
            <?php if ($counter == 10) { ?>
            </div>
            <?php } ?>
          <?php } if ($counter != 1 && ($counter%3) == 1 ) { ?>
            <div class="reset box_entry_pc"><br /></div>
          <?php } if ($counter != 1 && ($counter%2) == 1 ) { ?>
            <div class="reset box_entry_sp"><br /></div>
          <?php } if ($counter == 10) { break; } endwhile; ?>
          </div>
        </div>
        <?php wp_reset_query(); ?>
      </nav>

      <section>
        <ul class="panels">
          <li class="panel_title"><a>技術記事</a></li>
        </ul>
        <?php global $post; $mypost = get_posts( array( 'numberposts' => 3, 'category' => 58 ));?>
        <div class="l_frame">
        <?php foreach( $mypost as $post ) : setup_postdata($post); ?>
          <article class="index mb20">
            <div class="f_left">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <img src="<?php echo catch_that_image(); ?>" class="thumbnail_A f_left"/>
              </a>
              <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p class="description"><?php echo mb_substr(get_the_excerpt(),0,65);?>...</p>
              <p class="entry_more ml215"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </div>
            <div class="reset"></div>
          </article>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        </div>
      </section>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
