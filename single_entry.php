<?php get_header(); ?>
<body>
<div id="wrapper">
  <?php require("header_parts.php"); ?>
  <div class="main">
    <div id="content">
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

      <?php
        $prevpost = get_adjacent_post(false, '58', true);
        $nextpost = get_adjacent_post(false, '58', false);
        if( $prevpost or $nextpost ){
      ?>
      <section id="pre_next">
        <div class="f_left" style="width:50%">
          <img src="<?php echo specific_entry_image($prevpost) ?>" class="thumbnail_F" />
        </div>
        <div class="f_left t_right" style="width:50%">
          <img src="<?php echo specific_entry_image($nextpost) ?>" class="thumbnail_F" />
        </div>


      <?php
        if ( $prevpost ) {
          echo '
          <div class="f_left" style="width:50%">
          <p><a href="'.get_permalink($prevpost->ID).'">&#60;&#60;&nbsp;前の記事</a></p>
          <p>
            <a href="'.get_permalink($prevpost->ID).'">
            <img src="'.specific_entry_image($prevpost).'" class="thumbnail_F" />
            '.get_the_title($prevpost->ID).'</a>
          </p>
          </div>';
        } else {
          echo '<div><a href="/wp">トップへ戻る</a></div>';
        }
        if ( $nextpost ) {
          echo '
          <div class="t_right" style="">
          <p><a href="'.get_permalink($nextpost->ID).'">次の記事&nbsp;&#62;&#62;</a></p>
          <p>
            <a href="'.get_permalink($nextpost->ID).'">
            <img src="'.specific_entry_image($nextpost).'" class="thumbnail_F" />
            '.get_the_title($nextpost->ID).'</a>
          </p>
          </div>';
        } else {
          echo '<div><a href="/wp">トップへ戻る</a></div>';
        }
      ?>
      <div class="reset"><br /></div>
      </section>
      <?php } ?>

      <section>
        <ul class="panels">
          <li class="panel_title"><a><?php comments_number('コメント','コメント','コメント'); ?></a></li>
        </ul>
        <div class="l_frame">
          <?php comments_template(); ?>
        </div>
      </section>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
