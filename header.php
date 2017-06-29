<!DOCTYPE html>
<html>
<head>
<title><?php wp_title ( '|', true,'right' ); ?><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta property="fb:app_id" content="112219258880440" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
<?php if ( get_post_type() == 'tech' ) { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/tech.min.css" type="text/css" />
<?php } else if ( get_post_type() == 'dump' ) { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/dump.min.css" type="text/css" />
<?php } ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/responsive.min.css" type="text/css" />
<!--<script type="text/javascript" charset="utf-8" src="//use.edgefonts.net/source-code-pro.js"></script>-->
<?php wp_head(); ?>
</head>
