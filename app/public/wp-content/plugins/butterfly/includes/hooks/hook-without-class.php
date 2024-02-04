<?php
/**
 * Lets insert a paragraph before form in a-regular-hook-form.php
 * Using Action Hook
 * 
 * @since 1.0.0
 * @return void
 */
add_action('butterfly_before_form', 'butterfly_insert_some_condition_message');
function butterfly_insert_some_condition_message() {
    ob_start(); ?>
    <p><?php echo esc_html__("Please login, before form submit", 'butterfly'); ?></p>
    <?php
    $message = ob_get_clean();
    echo $message;
}

add_action('butterfly_after_form_submit', 'butterfly_show_form_id', 1);
function butterfly_show_form_id($id) {
    ob_start();?>
    <p><?php echo __('Your Form ID Is: ', 'butterfly'); ?><?php echo $id; ?></p>
<?php
echo ob_get_clean();
}



/**
 * Extend form username by custom hook
 */
add_filter('butterfly_form_username', 'butterfly_update_username');
function butterfly_update_username($username) {
    $username .= 'Of Butterfly';
    return $username;
}

/**
 * Lets remove previous butterfly_update_username function and add new one.
 * Which will show, please insert your username ( important: Remove filter first. and then add )
 */

 remove_filter('butterfly_form_username', 'butterfly_update_username');
 add_filter('butterfly_form_username', 'butterfly_update_username_after_remove');
 function butterfly_update_username_after_remove() {
    ob_start();
    $message = __('Please insert your username', 'butterfly');
    echo $message;
    return ob_get_clean();
 }
 /**
  * Update button text using filter hook
  */

  add_filter('hooked_without_class_submit_btn', 'butterfly_update_form_btn', 15);
  function butterfly_update_form_btn() {
    ob_start();
    echo __('Update button', 'butterfly');
    return ob_get_clean();
  }