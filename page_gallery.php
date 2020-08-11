<?php
/*
Template Name: Gallery
*/
?>
<?php require_once('insta.php'); ?>
<?php get_header(); ?>
<body>
<?php require("header_parts.php"); ?>
<div id="wrapper">
  <div id="main">
    <div id="content">
      <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/gallery_001.png" class="top_img" /></a>
      <section>
        <?php
          for($i=0; $i < count($media); $i++) {
            $caption = $media[$i]['caption'];
            $permalink = $media[$i]['permalink'];
            $media_url = $media[$i]['media_url'];
            $timestamp = $media[$i]['timestamp'];
            // 変換
            $datetime = DateTime::createFromFormat('Y-m-d\TH:i:s+', $timestamp);
            $datetime->setTimezone(new DateTimeZone('Asia/Tokyo'));
        ?>
        <div class="instagram f_left t_center">
          <time datetime="<?php echo $datetime->format('Y/m/d'); ?>" pubdate><?php echo $datetime->format('Y/m/d');  ?></time>
          <a href="<?php echo $permalink; ?>" title="<?php echo $caption; ?>">
          <img src="<?php echo $media_url; ?>" class="thumbnail_E"/>
          <p><?php echo $caption; ?></p></a>
        </div>
          <?php if (($i+1) == count($media)) { ?>
          <div class="reset"></div>
          <?php } elseif (($i%3) == 2) { ?>
          <div class="reset box_entry_pc"><br /></div>
          <?php } if (($i%2) == 1) { ?>
          <div class="reset box_entry_sp"><br /></div>
          <?php } ?>
        <?php } ?>
      </section>
    </div><!-- /#content -->
<?php get_sidebar(); ?>
  <div class="reset"></div>
  </div><!-- /#main -->
<?php get_footer(); ?>
