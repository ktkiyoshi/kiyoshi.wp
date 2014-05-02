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
        <?php require("socialbutton.php"); ?>
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
