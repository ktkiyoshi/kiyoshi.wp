<?php get_header(); ?>
<?php query_posts("cat=-54"); ?>

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
  <div id="header">
    <div class="top_img">
      <a href="/wp"><img src="<?php echo image(); ?>" /></a>
    </div>
<!--
  <?php require('menu.php'); ?>
<!--
    <div class="top_img">
      <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top-img.png" /></a>
    </div>
-->
  </div>

  <div id="left">
    <div id="tabs">
      <ul>
        <li><a href="#panel1">最新記事</a></li>
        <li><a href="#panel2">更新情報</a></li>
        <!--<li><a href="#panel3">超日記</a></li>-->
        <li><a href="#panel4">YRP野比</a></li>
      </ul>
      <div id="panel1" class="panel">
        <?php while (have_posts()) : the_post(); $counter++; ?>
          <?php if ($counter <= 1) { ?>
            <h1>
              <strong><a href="<?php the_permalink() ?>"><?php $title=the_title(); ?></a></strong>
              <small><?php the_time('Y-m-d (D) G:i') ?></small>
            </h1>
            <div class="entry">
              <?php the_content('<p class="entry_more">&raquo;続きを読む</p>'); ?>
              <p class="entry_more"><a href="" id="old_entry">&raquo;過去の記事</a></p>
            </div>
          <div id="box_entry" style="display:none">
          <?php }else{ ?>
            <p class="f_left">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
              <img src="<?php echo catch_that_image(); ?>" class="img_yoko"/></a>
            </p>
            <p class="exp_1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <p class="exp_2"><small><?php the_time('Y-m-d (D) G:i') ?></small></p>
            <p class="exp_2">
              <?php echo mb_substr(get_the_excerpt(),0,80);?>...
              <p class="old_entry_more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
              &raquo;<?php the_title(); ?>の続きを読む</a></p>
            </p>
            <div class="reset"></div>
          <?php } ?>
          <?php if ($counter == 4) { break; }?>
        <?php endwhile; ?>
          </div>
      </div>
      <div id="panel2" class="panel">
        <h1>超日記をオリジナルテーマ化</h1>
        <p class="f_left"><img src="<?php bloginfo('template_directory'); ?>/img/screenshot.png" class="img_yoko" /></p>
        <p class="exp_1">2012.06.22 ついにCMS化</p>
        <p class="exp_2">超日記とぷりてぃを融合し，CMSであるWordpressを用いた<br />
        ブログ兼サイトのハイブリッド仕様に生まれ変わりました．</br />
        ※オリジナルテーマのため，不具合が見られる可能性があります．</p>
        <div class="reset"></div>
        <hr />
        <h1>本日の一枚を更新</h1>
        <p class="exp_1">東京学芸大学（東京都小金井市）の桜</p>
        <p><img src="<?php bloginfo('template_directory'); ?>/img/t_photo/2012-04-09.jpg" class="img_yoko" /></p>
      </div>
      <div id="panel3" class="panel">
        <div class="f_left">
          <h1>最新記事</h1>
        <p class="exp_1"><a href="<?php echo $blogurl; ?>"><?php echo $title; ?><span style="font-size:8pt"> -<?php echo $post_date; ?>-</spam></a></p>
          <p style="margin-right:10px"><a href="<?php echo $blogurl; ?>"><img src="<?php echo $content; ?>" class="img_yoko" /></a></p>
        </div>
        <div class="f_left">
          <h1>現在の超日記</h1>
          <p class="doc_edit">Entry : <?php echo $count; ?></p>
          <p class="comment">Comment : <?php echo $count2; ?></p>
        </div>
        <div class="reset"></div>
      </div>
      <div id="panel4" class="panel">
        <h1>YRPブログ</h1>
        <p class="f_left">
          <a href="http://kt-kiyoshi.com/yrp/"><img src="<?php bloginfo('template_directory'); ?>/img/yrp-poster.jpeg" class="img_tate" /></a>
        </p>
        <p class="exp_1">2012.05.04-05 YRP合宿#1</p>
        <p class="thumbnail">
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw1.jpg" alt="carp"/>
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw2.jpg" alt="view on hill" />
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw3.jpg" alt="UNI" />
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw4.jpg" alt="bird" /><br />
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw5.jpg" alt="And I" />
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw6.jpg" alt="kapibara" />
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw7.jpg" alt="molmot" />
        <img src="<?php bloginfo('template_directory'); ?>/img/yrp_img/gw8.jpg" alt="saboten" />
        </p>
        <p class="reset"></p>
      </div>
    </div>
    <div class="l_frame">
      <h1>更新履歴<a href="" id="old_history"><img src="<?php bloginfo('template_directory'); ?>/img/zoom_icon&16.png" class="more" /></a></h1>
    </div>
    <div class="history">
      <ul>
        <li><span>'12.09.17</span>  サイドバーに"開発中"メニューを設置しました．</li>
        <li><span>'12.07.02</span>  facebook Like，Google+ buttonを設置しました．</li>
        <li><span>'12.06.23</span>  超日記をオリジナルテーマに変更しました．</li>
        <div id="box_history" style="display:none">
          <li><span>'12.05.27</span>  読書メーターを取り付けました．</li>
          <li><span>'12.05.20</span>  プロフィールを更新しました．</li>
          <li><span>'12.05.18</span>  YRPタブを取り付けました．</li>
          <li><span>'12.05.17</span>  Aboutページを作成しました．</li>
          <li><span>'12.05.16</span>  超日記タブを取り付けました．</li>
          <li><span>'12.05.15</span>  詳細ボタンを取り付けました。</li>
          <li><span>'12.05.13</span>  タブメニューを取り付けました。</li>
        </div>
      </ul>
    </div>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>