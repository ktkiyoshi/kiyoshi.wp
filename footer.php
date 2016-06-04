</div><!-- /#wrapper -->
<footer>
  <div id="footer">
    <?php if ( get_post_type() == 'tech' ) { ?>
    <div class="f_frame tag_list">
      <p class="title">タグ一覧</p>
        <?php $tech_tags = get_categories('title_li=&taxonomy=tech_tag'); $initial = '';$m_cnt = 0;?>
        <?php foreach($tech_tags as $tech_tag) : ?>
          <?php
          if($initial != strtoupper(substr(get_catname($tech_tag->cat_ID), 0, 1))) {
            if($initial != '') {
              if(($m_cnt % 2) == 1) {
                echo "</ul><br />";
              } else {
                echo "</ul>";
              }
              $m_cnt++;
            }
            $initial = strtoupper(substr(get_catname($tech_tag->cat_ID), 0, 1));
            echo "<ul><p>".$initial."</p>";
          }
          ?>
          <li class="f_minLink"><a href="<?php echo get_category_link($tech_tag->cat_ID); ?>">
          <?php echo get_catname($tech_tag->cat_ID);?>(<?php echo $tech_tag->count; ?>)
          </a></li>
        <?php endforeach; ?>
    </div>
    <?php } else { ?>
    <div class="f_frame archive_list">
      <p class="title">アーカイブ一覧</p>
      <?php $archives = get_archives_array(); $this_year = ''; ?>
      <?php if($archives): ?>
        <ul>
        <?php foreach($archives as $archive): ?>
        <?php if($this_year == '' || $this_year != $archive->year) { ?>
          <p><?php echo $archive->year; ?>年</p>
        <?php $m_cnt = 0; } ?>
          <li>
            <a href="<?php echo get_month_link($archive->year, $archive->month); ?>">
            <?php echo $archive->month; ?>月(<?php echo $archive->posts; ?>)</a>
          </li>
          <?php if($m_cnt == 5) { echo "<br class='display_pc' />"; } ?>
          <?php if($m_cnt == 3 || $m_cnt == 7) { echo "<br class='display_sp' />"; } ?>
          <?php $this_year = $archive->year; $m_cnt++; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
    <div class="f_frame category_list">
      <p class="title">カテゴリ一覧</p>
        <ul>
        <?php $categories = get_categories('exclude=54','hide_empty=true'); ?>
        <?php foreach($categories as $category) : ?>
          <li><a href="<?php echo get_category_link($category->cat_ID); ?>">
          <?php echo get_catname($category->cat_ID);?>(<?php echo $category->count; ?>)</a></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php } ?>
    <?php require("footer_profile_parts.php"); ?>
  </div>
</footer>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_javascript_uri() ?>side-fixed.js"></script>
<script>
(function($) {
    $(function() {
        var $header = $('#top-head');
        // Nav Fixed
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $header.addClass('fixed');
            } else {
                $header.removeClass('fixed');
            }
        });
        // Nav Toggle Button
        $('#nav-toggle').click(function(){
            $header.toggleClass('open');
        });
    });
})(jQuery);
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $(function(){
    $('.catNav li a').each(function(){
      var $href = $(this).attr('href');
      if(location.href.match($href)) {
        $(this).parent().addClass('active');
      } else {
        $(this).parent().removeClass('active');
      }
    });
  });
  $(function() {
    $('#tabs a[href^="#panel"]').click(function(){
        $("#tabs li").removeClass("active");
        $(this).parent().addClass("active");
        $("#tabs .panel").hide();
        $(this.hash).fadeIn();
        return false;
    });
    $('#tabs a[href^="#panel"]:eq(0)').trigger('click');
  });
  $(document).ready(function(){
    $("#old_entry").click(function(){
      $('#box_entry').slideToggle(500)
      return false;
    });
  });
});
</script>
<!-- Google+ -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!-- Twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!-- Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1&appId=112219258880440";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php wp_footer(); ?>
</body>
</html>
