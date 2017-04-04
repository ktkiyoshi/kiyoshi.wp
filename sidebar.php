<div id="side">
  <div id="sidefixed">
<!--
    <div class="affiliate t_center">
    <script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="0c90124c.ed5776d5.0c90124d.28929496";rakuten_items="ctsmatch";rakuten_genreId=0;rakuten_size="200x350";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>
    </div>
-->
    <div class="r_frame">
      <p class="title">人気記事ランキング</p>
    </div>
    <section>
      <ul>
      <?php
        // $populars = popularRanking(); // Old data
        $populars = viewingRanking();
        foreach($populars as $post) {
        ?>
        <li>
          <a href="<?php echo $post['url']; ?>" title="<?php echo $post['post_title']; ?>">
            <img src="<?php echo $post['image']; ?>" class="thumbnail_C f_left"/>
            <time datetime="<?php echo $post['date']; ?>" pubdate><?php echo $post['date']; ?></time>
            <p class="postTitle">
            <?php if(mb_strlen($post['post_title'])>80) {
                    $title= mb_substr($post['post_title'],0,80);
                    echo $title. ･･･ ;
                  } else {
                    echo $post['post_title'];
                  }?>
            </p>
            <p class="t_right tx_under fo_italy"><?php echo number_format($post['count']);?> views</p>
          </a>
        </li>
        <?php } ?>
      </ul>
    </section>

    <div class="r_frame">
      <p class="title">写真日記</p>
    </div>
    <section class="t_center">
      <ul>
      <?php global $post; $mypost = get_posts( array( 'numberposts' => 2, 'post_type' => 'photo' ));?>
      <?php foreach( $mypost as $post ) : setup_postdata($post); ?>
        <li class="photoDiary">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image("thumbnail"); ?>" class="thumbnail_F" /></a>
            <time datetime="<?php the_time('Y/m/d/D') ?>" pubdate><?php the_time('Y/m/d/D') ?></time>
        </li>
      <?php endforeach; ?>
      </ul>
    </section>

    <div class="r_frame">
      <p class="title">最新記事</p>
    </div>
    <section id="fixed_point">
      <ul>
        <?php
        $lastposts = get_posts('numberposts=10&orderby=post_date&category=-80');
        foreach($lastposts as $post) :
        $counter++;
        setup_postdata($post);
        ?>
        <?php if ($counter <= 5) { ?>
        <li>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <img src="<?php echo catch_that_image("thumbnail"); ?>" class="thumbnail_C f_left"/>
            <time datetime="<?php the_time('Y/m/d/D') ?>" pubdate><?php the_time('Y/m/d/D') ?></time>
            <p class="postTitle">
            <?php if(mb_strlen($post->post_title)>80) {
                    $title= mb_substr($post->post_title,0,80);
                    echo $title. ･･･ ;
                  } else {
                    echo $post->post_title;
                  }?>
            </p>
          </a>
        </li>
        <?php } endforeach; ?>
      </ul>
    </section>

<!--
//Add Widgets
<?php dynamic_sidebar(); ?>
-->
  </div><!-- /#sidefixed -->
</div><!-- /#side -->
