<!DOCTYPE html>
<html>
<head>
<title><?php wp_title ( '|', true,'right' ); ?><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width">
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

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<?php if (is_page('Gallery')){ ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/gallery.css" type="text/css" />
<?php } ?>
<?php wp_enqueue_script( 'jquery' ); ?>
<?php wp_head(); ?>
</head>