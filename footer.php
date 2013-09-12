  <div id="footer">

  <div style="margin-left:7px">
    <div class="f_frame">
      <ul>
        <?php wp_list_bookmarks('category_before=&category_after=&title_before=<h1 style="margin-bottom:3px;">&title_after=</h1>&category=37'); ?>
      </ul>
    </div>
    <div class="f_frame">
      <ul>
        <?php wp_list_bookmarks('category_before=&category_after=&title_before=<h1 style="margin-bottom:3px;">&title_after=</h1>&category=2'); ?>
      </ul>
    </div>
    <div class="f_frame">
      <h1 style="margin-bottom:3px;">Administrator</h1>
      <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
        <li><a href="/wiki">ウィキ</a></li>
      </ul>
    </div>
    <div class="copyright">
      <p class="img_center"><a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" /></a></p>
      <p>Copyright (C) <script type="text/javascript">myDate = new Date();myYear = myDate.getFullYear();document.write(myYear);</script> Kiyoshi All Rights Reserved.</p>
    </div>
  </div>
  <div class="reset"></div>
  </div>

</div><!-- container -->

<!--imgPreview-->
<script>
jQuery.noConflict();
(function($){  
$('.thumbnail img').imgPreview({
    containerID: 'imgPreviewWithStyles',
    imgCSS: {
        height: 200
    },
    onShow: function(link){
        $(link).stop().animate({opacity:0.4});
        $('img', this).css({opacity:0});
    },
    onLoad: function(){
        $(this).animate({opacity:1}, 300);
    },
    onHide: function(link){
        $(link).stop().animate({opacity:1});
    }
});
})(jQuery);
</script>

<script type="text/javascript">
jQuery(function($) {
var nav    = $('#ads'),
    offset = nav.offset();
$(window).scroll(function () {
  if($(window).scrollTop() > offset.top - 20) {
    nav.addClass('fixed');
  } else {
    nav.removeClass('fixed');
  }
});
});
</script>

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
<!-- Place this render call where appropriate -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<!-- Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=112219258880440";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php wp_footer(); ?>
</body>
</html>