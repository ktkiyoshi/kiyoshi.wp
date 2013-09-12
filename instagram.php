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