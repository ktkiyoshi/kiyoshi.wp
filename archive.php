<?php get_header(); ?>
</head>

<body>
<div id="container">
  <div id="header">
    <div class="top_img">
      <a href="/wp"><img src="<?php echo image(); ?>" /></a>
    </div>
  </div>

  <div id="left">
    <div class="l_frame">
      <h1 class="entry_title">
        <?php echo get_query_var('year').'年'.get_query_var('monthnum').'月'; ?>
      </h1>
      <?php
        $query_array = $wp_query->query_vars;
        $query_array['category__not_in'] = array(54);
        query_posts($query_array);
        global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
          $paginate_format = '';
          $paginate_base = add_query_arg('paged', '%#%');
        } else {
          $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .user_trailingslashit('page/%#%/', 'paged');
          $paginate_base .= '%_%';
        }
        $pagination = array( 'base' => $paginate_base,
                             'format' => $paginate_format,
                             'total' => $wp_query->max_num_pages,
                             'mid_size' => 5,
                             'current' => ($paged ? $paged : 1)
                           );
        echo '<div class="page-navi">'."\n";
        echo paginate_links($pagination);
        echo '</div>'."\n";
      ?>
        <?php while (have_posts()) : the_post(); $counter++; ?>
          <?php if ($counter <= 10) { ?>
            <div class="f_left">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
              <img src="<?php echo catch_that_image(); ?>" class="img_yoko"/></a>
            </div>
            <div class="new_entry">
              <p class="exp_1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <p class="exp_2"><small><?php the_time('Y-m-d (D) G:i') ?></small></p>
              <p class="exp_2">
                <?php echo mb_substr(get_the_excerpt(),0,80);?>...
                <p class="new_entry_more">
<!--
                  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                  &raquo;<?php the_title(); ?>の続きを読む</a>
-->
                  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                  &raquo;続きを読む</a>
                </p>
              </p>
            </div>
            <div class="reset"></div>
          <?php }else{ ?>
            <div class="f_left">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
              <img src="<?php echo catch_that_image(); ?>" class="img_yoko"/></a>
            </div>
            <div class="new_entry">
              <p class="exp_1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <p class="exp_2"><small><?php the_time('Y-m-d (D) G:i') ?></small></p>
              <p class="exp_2">
                <?php echo mb_substr(get_the_excerpt(),0,80);?>...
                <p class="new_entry_more">
                  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                  &raquo;<?php the_title(); ?>の続きを読む</a>
                </p>
              </p>
            </div>
            <div class="reset"></div>
          <?php } ?>
          <?php if ($counter == 10) { break; }?>
        <?php endwhile; ?>
    </div>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>