<?php
$post = $wp_query->post;
if ( in_category('') ) {
  include(TEMPLATEPATH . '/single-entry.php');
} else {
  include(TEMPLATEPATH . '/single-entry.php');
}
?>
