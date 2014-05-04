</div><!-- /#wrapper -->
<footer>
  <div id="footer">
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
        <?php $categories = get_categories('exclude=54','hide_empty=true'); foreach($categories as $category) : ?>
          <li><a href="<?php echo get_category_link($category->cat_ID); ?>">
          <?php echo get_catname($category->cat_ID);?>(<?php echo $category->count; ?>)</a></li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="f_frame author_info">
      <p class="title">中の人</p>
      <ul>
        <li>こんな人が書いてます</li>
        <li><img src="<?php bloginfo('template_directory'); ?>/img/profile.jpg" class="thumbnail_D f_left"></li>
      </ul>
    </div>
    <div class="reset"></div>
    <div class="copyright">
      <p>Copyright(C) <script type="text/javascript">myDate = new Date();myYear = myDate.getFullYear();document.write(myYear);</script> Kiyoshi All Rights Reserved.</p>
    </div>
  </div>
</footer>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_javascript_uri() ?>side-fixed.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
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
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
  $(document).ready(function(){
    $("#old_entry").click(function(){
      $('#box_entry').slideToggle(500)
      return false;
    });
  });
});
</script>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31926749-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
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