<!DOCTYPE html>
<html>
<head>
<title><?php wp_title ( '|', true,'right' ); ?><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta property="fb:app_id" content="112219258880440" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<?php wp_enqueue_script( 'jquery' ); ?>
<?php wp_head(); ?>
</head>
