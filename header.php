<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- facebook -->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" />
<?php /*  require_once("db_index.dat");*/ ?>

<head>
<title><?php wp_title ( '|', true,'right' ); ?><?php bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- OGP -->
  <meta property="fb:admins" content="100001174154207" />
  <meta property="fb:app_id" content="112219258880440" />
<?php if (is_front_page()){ ?>
  <meta property="og:type" content="blog" />
<?php } else { ?>
  <meta property="og:type" content="article" />
<?php } ?>
<?php if (is_single()){ ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <meta property="og:description" content="<?php echo mb_substr(get_the_excerpt(), 0, 100); ?>">
<?php endwhile; endif; ?>
  <meta property="og:title" content="<?php the_title();?>">
  <meta property="og:url" content="<?php the_permalink();?>">
<?php } else { ?>
  <meta property="og:description" content="<?php bloginfo('description');?>">
  <meta property="og:title" content="<?php bloginfo('name');?>">
  <meta property="og:url" content="<?php bloginfo('url');?>">
<?php } ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<?php
  $str = $post->post_content;
  $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if (is_single()){
if (has_post_thumbnail()){
  $image_id = get_post_thumbnail_id();
  $image = wp_get_attachment_image_src( $image_id, 'full');
?>
  <meta property="og:image" content="<?php echo $image[0] ?>">
<?php } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) { ?>
  <meta property="og:image" content="<?php echo $imgurl[2] ?>">
<?php } else { ?>
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/screenshot.png">
<?php }
} else { ?>
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/screenshot.png">
<?php } ?>
<!-- OGP -->

<!-- Load wordpress default jquery -->
<?php wp_enqueue_script( 'jquery' ); ?>
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<?php if (is_page('Gallery')){ ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/gallery.css" type="text/css" />
<?php } else { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/index.css" type="text/css" />
<?php } ?>

<script type="text/javascript" charset="utf-8" src="<?php echo get_javascript_uri() ?>jquery/img_preview/img_preview.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

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