<div id="side">
<div id="sidefixed">
  <div class="affiliate">
  <!-- Rakuten Widget FROM HERE -->
   <script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="0c90124c.ed5776d5.0c90124d.28929496";rakuten_items="ctsmatch";rakuten_genreId=0;rakuten_size="200x350";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";</script><script type="text/javascript" src="http://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>
  <!-- Rakuten Widget TO HERE -->
  </div>

  <div id="ads">
    <div class="r_frame">
      <p class="title">Blog Entry</p>
    </div>
      <ul>
        <?php
        $lastposts = get_posts('numberposts=10&orderby=post_date&category=-54,-58');
        foreach($lastposts as $post) :
        $counter++;
        setup_postdata($post);
        ?>
        <?php if ($counter <= 5) { ?>
        <li>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?></a> (<?php the_time('m/d'); ?>)
        </li>
        <?php } endforeach; ?>
      </ul>
  </div><!-- /#ads -->
<!--
//Add Widgets
<?php dynamic_sidebar(); ?>
-->
  </div>
</div><!-- /#side -->
