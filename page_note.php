<?php
/*
Template Name: note
*/
?>
<?php get_header(); ?>

<body>
  <?php require("parts/header_link.php"); ?>
  <div id="wrapper">
    <div id="main">
      <div id="content">
        <a href="/wp/note">
          <img src="<?php bloginfo('template_directory'); ?>/img/note/logo.png" class="note_logo" />
        </a>
        <section class="clearfix">
          <?php
          $rss_items = my_feed_display('https://note.com/ktkiyoshi/rss', '10');
          foreach ($rss_items as $item) {
            $hash = substr($item->get_link(), strrpos($item->get_link(), '/') + 1);
            $api_data = file_get_contents('https://note.mu/api/v1/' . 'notes/' . $hash);
            $eyecatch = json_decode($api_data, true)['data']['eyecatch'];
          ?>
            <article class="index matchHeight note">
              <header>
                <ul class="entry_meta">
                  <li><time datetime="<?php echo $item->get_date('Y/m/d (D) G:i'); ?>" pubdate><?php echo $item->get_date('Y/m/d (D) G:i'); ?></time></li>
                </ul>
                <h1><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a></h1>
              </header>
              <div class="entry_info t_center">
                <a href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_title(); ?>" target="_blank">
                  <img src="<?php echo $eyecatch; ?>" class="thumbnail_D" />
                </a>
                <p class="description_A">
                  <?php echo str_replace("---続きをみる", "", mb_strimwidth(strip_tags($item->get_description()), 0, 120, "...", "UTF-8")); ?>
                </p>
                <p class="entry_more">
                  <a href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_title(); ?>" target="_blank">&raquo;noteで続きを読む</a>
                </p>
              </div>
            </article>
          <?php } ?>
        </section>
        <div class="note_more"><a href="https://note.com/ktkiyoshi" target="_blank">noteをもっと見る</a></div>
      </div><!-- /#content -->
      <?php get_sidebar(); ?>
      <div class="reset"></div>
    </div><!-- /#main -->
  </div>
  <?php get_footer(); ?>