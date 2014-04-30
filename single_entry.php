<?php get_header(); ?>
</head>

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
<!--     <div class="top_img">
      <a href="/wp"><img src="<?php echo image(); ?>" /></a>
    </div> -->
  </header><!-- /#header -->

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
        <div class="social">
          <!-- Google+1 -->
          <div><g:plusone size="medium" annotation="none"></g:plusone></div>
          <!-- Hatena -->
          <div><a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="en" title="<?php the_title(); ?>"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></div>
          <!-- facebook -->
          <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
          <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="button_count"></div>
          <!-- Twitter -->
          <div><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="ktkiyoshi" data-lang="en">Tweet</a></div>
        </div>
      </article>

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
