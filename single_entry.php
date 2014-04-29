<?php get_header(); ?>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div class="top_img">
      <a href="/wp"><img src="<?php echo image(); ?>" /></a>
    </div>
  </div>

  <section>
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
        <!-- facebook -->
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
        <!-- Hatena -->
        <a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="<?php the_title(); ?>"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
      </div>
    </div>



    <div class="l_frame">
      <?php comments_template(); ?>
    </div>
  </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
