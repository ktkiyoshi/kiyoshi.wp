<script type="text/javascript">
jQuery(document).ready(function($) {
  $(document).ready(function(){
    $("#entry_list").click(function(){
      $('#box_entry_list').slideToggle(500)
      return false;
    });
  });
});
</script>
  <div id="right">
    <!-- index.php only
    <?php if(!is_home()): ?>
      <div>
        <a href="/wordpress"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" /></a>
      </div>
    <?php endif; ?>
    -->

  <div class="affiliate">
  <!-- Rakuten Widget FROM HERE -->
   <script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="0c90124c.ed5776d5.0c90124d.28929496";rakuten_items="ctsmatch";rakuten_genreId=0;rakuten_size="200x350";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>
  <!-- Rakuten Widget TO HERE -->
  </div>

    <div id="ads">
    <div class="r_frame">
      <h1>Blog Entry<a href="" id="entry_list">
        <img src="<?php bloginfo('template_directory'); ?>/img/zoom_icon&16.png" class="more" />
      </a></h1>
    </div>
      <ul>
        <?php
        $lastposts = get_posts('numberposts=10&orderby=post_date&category=-54');
        foreach($lastposts as $post) :
        $counter++;
        setup_postdata($post);
        ?>
        <?php if ($counter <= 5) { ?>
        <li>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?></a> (<?php the_time('m/d'); ?>)
        </li>
          <?php if ($counter == 5) { ?>
            <div id="box_entry_list" style="display:none">
          <?php } ?>
        <?php }else{ ?>
        <li>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?></a> (<?php the_time('m/d'); ?>)
        </li>
        <?php } ?>
        <?php endforeach; ?>
            </div>
      </ul>

      <ul class="no_list">
        <li><select name="archive-dropdown" class="dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
        <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
        <?php wp_get_archives('type=monthly&format=option&show_post_count=1&cat=-54'); ?>
        </select></li>
        <li><form action="<?php bloginfo('url'); ?>/" method="get">
        <?php $select = wp_dropdown_categories('show_option_none=カテゴリーを選択&show_count=1&hierarchical=1&orderby=name&depth=0&echo=0&selected=0&exclude=54');
        echo $select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select); ?>
        <noscript><input type="submit" value="View" /></noscript>
        </form></li>
      </ul>

<!--
//Add Widgets
<?php dynamic_sidebar(); ?>
-->

<!--
    <div class="r_frame"><h1>Author</h1></div>
    <p class="f_left">
      <img src="<?php bloginfo('template_directory'); ?>/img/me.png" width="100px"/>
    </p>
    <p>Kiyoshi</p>
    <div>
      <dl>
      <dt>Birthday | 1988/10/17</dt>
      <dt>From | Yokohama</dt>
      <dt>Blood Type | O</dt>
      <dt>Hobby | Movie, Web design, Snow Board</dt>
      <dt>Job | System Engineer</dt>
      <dt>Blog | <a href="https://kt-kiyoshi.com/wp/">超日記</a></dt>
      <dt>Mobile | GalaxyS</dt>
      <dt>PC | MacBookPro, VAIO</dt>
    </dl>
    </div>
    <div class="r_frame"><h1>読書メーター</h1></div>
    <div class="affiliate">
      <p><a href="https://book.akahoshitakuya.com/u/68613" title="最近読んだ本">
      <img src="https://img.bookmeter.com/bp_image/160/69/68613.jpg" border="0" alt="最近読んだ本">
      </a></p>
    </div>
-->
    </div>
  </div>