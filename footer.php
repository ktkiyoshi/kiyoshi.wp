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
<?php wp_footer(); ?>
</body>
</html>