<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
  <nav class="catNav">
    <ul>
      <li class="book"><a href="/wp/category/book">読 書</a></li>
      <li class="movie"><a href="/wp/category/movie">映 画</a></li>
      <li class="live"><a href="/wp/category/live">ライブ</a></li>
      <li class="travel"><a href="/wp/category/travel">旅 行</a></li>
      <li class="pokemon"><a href="/wp/category/pokemon">ポケモン</a></li>
    </ul>
  </nav>
  <div id="main">
    <div id="content">
      <nav id="tabs">
<!--
        <ul class="panels t_center">
            <li class="panel_title"><a href="#panel1">日　記</a></li>
            <li class="panel_title"><a href="#panel2">掃　溜</a></li>
            <li class="panel_title"><a href="#panel3">読書記事</a></li>
        </ul>
-->
        <div id="panel1" class="panel">
        <?php
            $query_array = $wp_query->query_vars;
            $query_array['posts_per_page'] = 9;
            query_posts($query_array);
            $paginate_base = get_pagenum_link(1);
            if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                $paginate_format = '';
                $paginate_base = add_query_arg('paged', '%#%');
            } else {
                $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .user_trailingslashit('page/%#%/', 'paged');
                $paginate_base .= '%_%';
            }
            $pagination = array('base' => $paginate_base,
                                'format' => $paginate_format,
                                'total' => $wp_query->max_num_pages,
                                'mid_size' => 4,
                                'current' => ($paged ? $paged : 1)
                                );
            echo '<div class="page-navi">'."\n";
            echo paginate_links($pagination);
            echo '</div>'."\n";
            while (have_posts()) : the_post(); $cnt++;
            if ($cnt == 1) {
        ?>
            <article>
              <header>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <ul class="entry_meta">
                  <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                  <li>| <?php the_category(' | ') ?></li>
                  <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                </ul>
              </header>
              <div class="entry_info">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_A"/></a>
                <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
                <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
              </div>
            </article>
          <?php } else if ($cnt != 1) { ?>
            <article class="index matchHeight">
              <header>
                <ul class="entry_meta">
                  <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                  <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                </ul>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              </header>
              <div class="entry_info t_center">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D"/></a>
                <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
                <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
              </div>
            </article>
          <?php
            }
            endwhile;
            echo '<div class="page-navi">'."\n";
            echo paginate_links($pagination);
            echo '</div>'."\n";
            wp_reset_query();
          ?>
        </div>

<!--
      <section>
        <div id="panel2" class="panel">
        <?php
            $query_array = $wp_query->query_vars;
            $query_array['posts_per_page'] = 5;
            $query_array['post_type'] = 'dump';
            query_posts($query_array);
            while (have_posts()) : the_post();
        ?>
            <article class="index matchHeight">
              <header>
                <ul class="entry_meta">
                  <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                  <li><?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
                </ul>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              </header>
              <div class="entry_info t_center">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_D"/></a>
                <p class="description_A"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "...", "UTF-8"); ?></p>
                <p class="entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
              </div>
            </article>
        <?php
            endwhile;
            wp_reset_query();
         ?>
        </div>
      </section>
-->
<!--
      <section>
        <div id="panel3" class="panel">
        <?php global $post; $mypost = get_posts( array( 'numberposts' => 10, 'category' => 26 ));?>
        <?php foreach( $mypost as $post ) : setup_postdata($post); ?>
          <article class="index mb20">
            <header>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <ul class="entry_meta">
                <li><time datetime="<?php the_time('Y/m/d (D) G:i') ?>" pubdate><?php the_time('Y/m/d (D) G:i') ?></time></li>
                <li>| <?php the_category(' | ') ?></li>
                <li>| <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?></li>
              </ul>
            </header>
            <div class="entry_info">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_that_image(); ?>" class="thumbnail_B f_left"/></a>
              <p class="description_B"><?php echo mb_strimwidth(get_the_excerpt(), 0, 150, "...", "UTF-8"); ?></p>
              <p class="entry_more ml215"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&raquo;続きを読む</a></p>
            </div>
          </article>
          <div class="reset"></div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        </div>
      </section>
-->
      </nav>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
