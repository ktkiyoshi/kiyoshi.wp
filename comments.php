<?php wp_list_comments('type=comment&callback=super_comments'); ?>
<?php
$fields =  array(
  'author' => '<p class="comment-form-author">' . '<label for="author">' . 'Name' . '</label><br />' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
  // 'email' => '<p class="comment-form-email"><label for="email">' . 'Email' . '</label><br />' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
  // 'url' => '<p class="comment-form-url"><label for="url">' . 'Website' . '</label><br />' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
);
$defaults = array(
 'fields' => apply_filters( 'comment_form_default_fields', $fields ),
 'comment_field' => '<p class="comment-form-comment"><label for="comment">' . 'Comment'. '</label><br />' . '<textarea id="comment" name="comment" cols="60" rows="8" aria-required="true"></textarea></p>',
 'must_log_in' => '<p class="must-log-in">' .  sprintf('You must be <a href="%s">logged in</a> to post a comment.', wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
 'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
 // 'comment_notes_before' => '<small class="comment-notes">' . 'Your email address will not be published.' . ( $req ? $required_text : '' ) . '</small>',
 'comment_notes_before' => '',
 'comment_notes_after'  => '',
 'id_form'              => 'commentform',
 'id_submit'            => 'submit',
 'title_reply'          => '',
 'title_reply_to'       => '',
 'cancel_reply_link'    => '',
 'label_submit'         => 'Post Comment',
);
?>
<?php comment_form($defaults); ?>
