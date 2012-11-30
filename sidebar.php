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

    <div class="r_frame"><h1>開発中
      <a href="http://dev.kt-kiyoshi.com/projects/cooking"><img src="<?php bloginfo('template_directory'); ?>/img/zoom_icon&16.png" class="more" /></a></h1></div>
      <ul>
      <li><a href="http://cooking.kt-kiyoshi.com/">Cooking System</a></li>
      </ul>

    <div class="r_frame">
      <h1>ブログエントリー
      <a href="" id="entry_list"><img src="<?php bloginfo('template_directory'); ?>/img/zoom_icon&16.png" class="more" /></a></h1>
    </div>
      <ul>
        <?php
        $lastposts = get_posts('numberposts=15&orderby=post_date&category=-54');
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
        <li><select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
        <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
        <?php wp_get_archives('type=monthly&format=option&show_post_count=1&cat=-54'); ?>
        </select></li>
        <li><form action="<?php bloginfo('url'); ?>/" method="get">
        <?php $select = wp_dropdown_categories('show_option_none=カテゴリーを選択&show_count=1&orderby=name&echo=0&selected=0&exclude=54');
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
      <dt>Hobby | Movie, Web design</dt>
      <dt>Job | Engineer</dt>
      <dt>Blog | <a href="http://kt-kiyoshi.com/wp/">超日記</a></dt>
      <dt>Mobile | GalaxyS</dt>
      <dt>PC | MacBookPro, VAIO</dt>
    </dl>
    </div>
-->

    <div class="r_frame"><h1>読書メーター</h1></div>
      <p><a href="http://book.akahoshitakuya.com/u/68613" title="最近読んだ本">
      <img src="http://img.bookmeter.com/bp_image/160/69/68613.jpg" border="0" alt="最近読んだ本"></a></p>
    </div>