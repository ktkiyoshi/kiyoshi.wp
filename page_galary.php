<?php
/*
Template Name: Galary
*/
?>

<?php get_header(); ?>
</head>
<body>
<div id="container">

  <div id="header">
    <p class="top_img">
      <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/galary_001.png" /></a>
    </p>
    <p class="user">
      xxxxxxxxxxxxxxxxxxxxxx
    </p>
  </div>

  <div id="left">
    <div class="l_frame">
    </div>
  </div>

  <div id="right">
    <div class="r_frame">
      <?php the_post();the_content(); ?>
<?php
$limit=2;
/* Instagram */
define('USER_NAME', 'ktkiyoshi');
define('USER_ID', '207703315');
define('ACCESS_TOKEN', '207703315.e222e56.74b77feb8d3e453cbdf66059b2216728');
define('API_URL', 'https://api.instagram.com/v1/users/'.USER_ID.'/media/recent?access_token='.ACCESS_TOKEN);

$uri=API_URL.'&count='.$limit;
$options['request_type'] = 0;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_POST, $options['request_type']);
if( !empty($options['post']) ) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $options['post']);
}
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$json = json_decode(curl_exec($ch), true);
curl_close($ch);

$data = $json[data];
$caption = $data[0][caption];
echo $caption[created_time];
echo $caption[text];
echo "<a href=" . $data[0][link] . ">" . $caption[text] . "</a>";
?>
    </div>

    <div class="affiliate">
      <a href="http://hb.afl.rakuten.co.jp/hsc/108caad3.394b54eb.108caacf.034b8c67/" target="_blank">
      <img src="http://hbb.afl.rakuten.co.jp/hsb/108caad3.394b54eb.108caacf.034b8c67/" border="0"></a>
    </div>
  </div>

<?php get_footer(); ?>