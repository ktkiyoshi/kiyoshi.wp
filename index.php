<?php get_header(); ?>
<!-- Exclude ABOUT & IT -->
<?php query_posts("cat=-54,-58"); ?>
<!-- Instagram -->
<?php require_once('instagram.php'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
  $(document).ready(function(){
    $("#old_entry").click(function(){
      $('#box_entry').slideToggle(500)
      return false;
    });
    $("#old_history").click(function(){
      $('#box_history').slideToggle(500)
      return false;
    });
  });
});
</script> 
</head>
<body>
<div id="container">

<!--
<div id="header">
  <div class="logo"><a href="/wp">
    <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" /></a>
  </div>
</div>
-->

  <div id="left">
    <div id="slide">
      <?php if ( function_exists( "easingsliderlite" ) ) { easingsliderlite(); } ?>
    </div>
<!--
    <p class="top_img">
    <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/title_007.png" /></a>
    </p>
-->
 <!-- tabs menu start -->
    <div id="tabs">
      <ul>
        <li><a href="#panel1">最新記事</a></li>
        <li><a href="#panel2">更新情報</a></li>
<!--        <li><a href="#panel3">超日記</a></li>-->
        <li><a href="#panel4">YRP野比</a></li>
      </ul>
    <div id="panel1" class="panel">
      <?php while (have_posts()) : the_post(); $counter++; ?>
        <?php if ($counter <= 1) { ?>
          <div class="f_left">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
            <img src="<?php echo catch_that_image(); ?>" class="img_yoko"/></a>
          </div>
          <div class="new_entry">
            <p class="exp_1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <p class="exp_2"><small><?php the_time('Y-m-d (D) G:i') ?></small></p>
            <p class="exp_2">
              <?php echo mb_substr(get_the_excerpt(),0,120);?>...
              <p class="new_entry_more">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                &raquo;<?php the_title(); ?>の続きを読む</a>
              </p>
            </p>
          </div>
          <div class="reset">
            <p class="entries_more"><a href="" id="old_entry">&raquo;過去の記事</a></p>
          </div>
          <div id="box_entry" style="display:none">
        <?php }else{ ?>
          <div class="old_entries">
            <p class="exp_1">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
              <span class="exp_2"><small><?php the_time('Y-m-d (D) G:i') ?></small></a></span>
            </p>
            <p><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
            <img src="<?php echo catch_that_image(); ?>" class="img_yoko"/></a></p>
            <p class="exp_2">
              <?php echo mb_substr(get_the_excerpt(),0,50);?>...
              <p class="old_entry_more">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                &raquo;<?php the_title(); ?>の続きを読む</a>
              </p>
            </p>
          </div>
        <?php } if ($counter != 1 && ($counter%3) == 1 ) { ?>
          <div class="reset"><br /></div>
        <?php } if ($counter == 10) { ?>
          <div class="reset"></div>
        <?php break; } endwhile; ?>
        </div>
      </div>

      <div id="panel2" class="panel">
          <div class="f_left">
            <img src="<?php bloginfo('template_directory'); ?>/img/screenshot.png" class="img_yoko" />
          </div>
          <div class="new_entry">
            <p class="exp_1">超日記をオリジナルテーマ化</p>
            <p class="exp_2"><small>2012-6-22</small></p>
            <p class="exp_2">超日記とぷりてぃを融合し，CMSであるWordpressを用いた<br />ブログ兼サイトのハイブリッド仕様に生まれ変わりました．</br />※オリジナルテーマのため，不具合が見られる可能性があります．
          </div>
          <div class="reset"></div>
      </div>

<!--
      <div id="panel3" class="panel">
        <div class="f_left">
          <?php include("http://kt-kiyoshi.com/blog.php"); ?>
        </div>
        <div class="f_left">
          <h1>最新記事</h1>
          <p class="exp_1"><a href="<?php echo $blogurl; ?>"><?php echo $title; ?>
          <span style="font-size:8pt"> -<?php echo $post_date; ?>-</spam></a></p>
          <p style="margin-right:10px"><a href="<?php echo $blogurl; ?>">
          <img src="<?php echo $content; ?>" class="img_yoko" /></a></p>
        </div>
        <div class="f_left">
          <h1>現在の超日記</h1>
          <p class="doc_edit">Entry : <?php echo $count; ?></p>
          <p class="comment">Comment : <?php echo $count2; ?></p>
        </div>
        <div class="reset"></div>
      </div>
-->

      <div id="panel4" class="panel">
        <div class="f_left">
          <a href="http://kt-kiyoshi.com/yrp/"><img src="<?php bloginfo('template_directory'); ?>/img/yrp-poster.jpeg" class="img_tate" /></a>
        </div>
        <p class="exp_1">2012.05.04-05 YRP合宿#1</p>
        <div class="thumbnail">
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw1.jpg" alt="carp"/>
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw2.jpg" alt="view on hill" />
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw3.jpg" alt="UNI" />
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw4.jpg" alt="bird" /><br />
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw5.jpg" alt="And I" />
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw6.jpg" alt="kapibara" />
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw7.jpg" alt="molmot" />
          <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw8.jpg" alt="saboten" />
        </div>
        <div class="reset"></div>
      </div>
    </div>
    <!-- tabs menu end -->

    <div class="l_frame">
      <h1>Recent Gallery<a href="" id="old_history"><img src="<?php bloginfo('template_directory'); ?>/img/zoom_icon&16.png" class="more" /></a></h1>
    </div>
    <?php
     for($i=0; $i < count($media); $i++) {
      $caption = $media[$i][caption];
      $images = $media[$i][images];
    ?>
    <div class="photos">
        <p class="exp_1">
          <?php echo date('Y/m/d', $caption[created_time]); ?> 
        </p>
        <p><a href="<?php echo $media[$i][link]; ?>" title="<?php echo $caption[text]; ?>">
          <img src="<?php echo $images[thumbnail][url]; ?>" class="img_yoko"/></a></p>
          <span class="exp_2"><a href="<?php echo $media[$i][link]; ?>"><?php echo $caption[text]; ?></a></span>
        </div>
        <?php if (($i%3) == 2 || ($i+1) == count($media)) { ?>
        <div class="reset"><br /></div>
        <?php } ?>
  <?php } ?>
    </div>

    <div class="l_frame">
      <h1>Update History<a href="" id="old_history"><img src="<?php bloginfo('template_directory'); ?>/img/zoom_icon&16.png" class="more" /></a></h1>
    </div>
    <div class="history">
      <ul>
        <?php require_once('history.php'); ?>
      </ul>
    </div>
    <div class="affiliate">
      <a href="http://hb.afl.rakuten.co.jp/hsc/108caad3.394b54eb.108caacf.034b8c67/" target="_blank">
      <img src="http://hbb.afl.rakuten.co.jp/hsb/108caad3.394b54eb.108caacf.034b8c67/" border="0"></a>
    </div>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>