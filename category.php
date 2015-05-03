<?php get_header(); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div class="main">
    <div id="content">
      <section>
        <ul class="panels">
          <li class="panel_title"><a><?php single_term_title(); ?></a></li>
        </ul>
      <?php
        $query_array = $wp_query->query_vars;
        $query_array['posts_per_page'] = 20;
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
        <?php while (have_posts()) : the_post(); ?>
          <article class="index archive">
            <div class="f_left">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <img src="<?php echo catch_that_image(); ?>" class="thumbnail_B f_left"/>
              </a>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p><time datetime="<?php the_time('Y-m-d (D) G:i') ?>" pubdate><?php the_time('Y-m-d (D) G:i') ?></time></p>
              <p class="description">
                <?php echo mb_substr(get_the_excerpt(),0,80);?>...
                <p class="entry_more ml215">
                  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                  &raquo;続きを読む</a>
                </p>
              </p>
            </div>
            <div class="reset"></div>
            </article>
        <?php endwhile;
          echo '<div class="page-navi">'."\n";
          echo paginate_links($pagination);
          echo '</div>'."\n";
        ?>
      </section>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>