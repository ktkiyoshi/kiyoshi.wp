<?php
require('/var/www/sec/instagram.php');
$limit=30;

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
