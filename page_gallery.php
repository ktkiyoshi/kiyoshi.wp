<?php
/*
Template Name: Gallery
*/
?>
<!-- Instagram -->
<?php require_once('instagram.php'); ?>

<?php get_header(); ?>
<body>
<div id="wrapper">
  <header id="header">
    <h1><a href="/wp">超日記</a></h1>
    <nav>
      <ul>
        <li><a href="">ABOUT</a></li>
        <li><a href="/wp/gallery">GALLERY</a></li>
      </ul>
    </nav>
  </header><!-- /#header -->

  <div id="main">
    <div id="content">
      <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/gallery_001.png" /></a>
      <section>
        <?php
          for($i=0; $i < count($media); $i++) {
            $caption = $media[$i][caption];
            $images = $media[$i][images];
        ?>
        <div class="instagram f_left t_center">
          <time datetime="<?php echo date('Y/m/d', $caption[created_time]); ?>" pubdate><?php echo date('Y/m/d', $caption[created_time]); ?></time>
          <a href="<?php echo $media[$i][link]; ?>" title="<?php echo $caption[text]; ?>">
          <img src="<?php echo $images[thumbnail][url]; ?>" class="thumbnail_E"/>
          <p><?php echo $caption[text]; ?></p></a>
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
