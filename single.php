<?php
$post = $wp_query->post;
if ( in_category('80') ) {
  include(TEMPLATEPATH . '/photo_diary.php');
} else {
  include(TEMPLATEPATH . '/single_entry.php');
}
?>