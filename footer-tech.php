</div><!-- /#wrapper -->
<footer>
  <div id="footer">
    <div class="f_frame tag_list">
      <p class="title">タグ一覧</p>
        <!-- <ul> -->
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
        <!-- </ul> -->
    </div>

    <?php require("footer_profile_parts.php"); ?>
  </div>
</footer>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_javascript_uri() ?>side-fixed.js"></script>
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
