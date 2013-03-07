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
      <h1 class="entry_title"><?php the_title(); ?></h1>
      <p class="entry_meta">
        <?php the_time('Y-m-d (D) G:i') ?> | 
        <?php the_category(' | ') ?> | 
        <?php edit_post_link('Edit', '<span class="admin">', '</span>'); ?>
      </p>
      <div class="entry">
        <?php the_post();the_content(); ?>
        <br />
        <!-- Place this tag where you want the +1 button to render -->
        <g:plusone size="medium" annotation="none"></g:plusone>
        <br />
        <!-- facebook -->
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
      </div>
    </div>



    <div class="l_frame">
      <?php comments_template(); ?>
    </div>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
