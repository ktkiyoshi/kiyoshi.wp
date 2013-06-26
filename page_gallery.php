<?php
/*
Template Name: Gallery
*/
?>

<?php
$limit=30;
/* Instagram */
define('USER_NAME', 'ktkiyoshi');
define('USER_ID', '207703315');
define('ACCESS_TOKEN', '207703315.e222e56.74b77feb8d3e453cbdf66059b2216728');
define('API_URL_USER', 'https://api.instagram.com/v1/users/'.USER_ID.'?access_token='.ACCESS_TOKEN);
define('API_URL_MEDIA', 'https://api.instagram.com/v1/users/'.USER_ID.'/media/recent?access_token='.ACCESS_TOKEN);

$uri = array(API_URL_USER, API_URL_MEDIA.'&count='.$limit);
$options = array(
  CURLOPT_POST => false,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true
);
for($i = 0; $i < count($uri); $i++) {
  $ch = curl_init();
  curl_setopt_array($ch, $options);
  curl_setopt($ch, CURLOPT_URL, $uri[$i]);
  $json[$i] = json_decode(curl_exec($ch), true);
  curl_close($ch);
}
$user = $json[0][data];
$media = $json[1][data];
?>

<?php get_header(); ?>
</head>
<body>
<div id="container">

  <div id="header">
    <p class="top_img">
      <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/top/gallery_001.png" /></a>
    </p>
    <p class="affiliate">
    <!-- Rakuten Widget FROM HERE -->
    <script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="0c90124c.ed5776d5.0c90124d.28929496";rakuten_items="ctsmatch";rakuten_genreId=0;rakuten_size="200x200";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";</script><script type="text/javascript" src="http://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>
    <!-- Rakuten Widget TO HERE -->
    </p>
  </div>

  <div id="left">
    <div id="ads">
    <div class="l_frame">
      <h1>Profile</h1>
    </div>
    <div class="l_frame profile">
      <p><img src="<?php echo $user[profile_picture]; ?>" /></p>
      <p><?php echo $user[username]; ?></p>
<!--
      <p>フォロー：<?php echo $user[counts][follows]; ?></p>
      <p>フォロワー：<?php echo $user[counts][followed_by]; ?></p>
-->
    </div>
<!--
    <div id="menu">
      <ul>
-->
<?php
// for($i = 0; $i < count($media); $i++) {
//   $caption = $media[$i][caption];
?>
<!--
        <li>
          <a><?php echo $caption[text]; ?></a>
        </li>
-->
<?php //} ?>
<!--
      </ul>
    </div>
-->
  </div>
  </div>

  <div id="right">
    <div class="r_frame">
      <h1>Recent <?php echo $user[counts][media]; ?> Instagram's Photos</h1>
    </div>
    <div class="r_frame">
<?php
 for($i=0; $i < count($media); $i++) {
   $caption = $media[$i][caption];
   $images = $media[$i][images];
?>
        <div class="photos">
          <p class="exp_1">
            <?php echo date('Y/m/d H:i', $caption[created_time]); ?> 
          </p>
          <p><a href="<?php echo $media[$i][link]; ?>" title="<?php echo $caption[text]; ?>">
          <img src="<?php echo $images[thumbnail][url]; ?>" class="img_yoko"/></a></p>
          <span class="exp_2"><a href="<?php echo $media[$i][link]; ?>"><?php echo $caption[text]; ?></a></span>
        </div>
        <?php if (($i%3) == 2 || ($i+1) == count($media)) { ?>
        <div class="reset"><br /></div>
        <?php } ?>
<?php } ?>
    </div>
    <div class="affiliate">
      <a href="http://hb.afl.rakuten.co.jp/hsc/108caad3.394b54eb.108caacf.034b8c67/" target="_blank">
      <img src="http://hbb.afl.rakuten.co.jp/hsb/108caad3.394b54eb.108caacf.034b8c67/" border="0"></a>
    </div>
  </div>

<?php get_footer(); ?>