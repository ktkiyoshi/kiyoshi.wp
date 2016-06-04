<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper" class="tech">
  <div id="main">
    <div id="content">
      <section>
        <?php
          $query_array = $wp_query->query_vars;
          $query_array['posts_per_page'] = 10;
          $query_array['post_type'] = 'tech';
          query_posts($query_array);

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
          while (have_posts()) : the_post();
        ?>
          <article class="index">
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
              <p class="description_B"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
              <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </div>
            <div class="reset"></div>
          </article>
        <?php
          endwhile;
          echo '<div class="page-navi">'."\n";
          echo paginate_links($pagination);
          echo '</div>'."\n";
          wp_reset_query();
        ?>
      </section>
    </div><!-- /#content -->
<?php get_sidebar('tech'); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
