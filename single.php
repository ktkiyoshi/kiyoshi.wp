<?php
$post = $wp_query->post;
if ( in_category('0') ) {
  include(TEMPLATEPATH . '/single_entry.php');
?>

<!--
} elseif ( in_category('2') ) {
  include(TEMPLATEPATH . '/single02.php');
} elseif ( in_category('3') ) {
  include(TEMPLATEPATH . '/single03.php');
} elseif ( in_category('カテゴリのID') ) {
  include(TEMPLATEPATH . '/呼び出したいファイル名.php');
-->

<?php
} else {
  include(TEMPLATEPATH . '/single_entry.php');
}
?>