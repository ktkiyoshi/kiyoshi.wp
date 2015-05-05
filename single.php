<?php
$post = $wp_query->post;
if ( in_category('') ) {
  include(TEMPLATEPATH . '/single_entry.php');
} else {
  include(TEMPLATEPATH . '/single_entry.php');
}
?>