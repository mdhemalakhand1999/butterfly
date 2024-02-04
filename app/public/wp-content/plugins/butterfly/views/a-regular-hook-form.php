<?php
/**
 * Its for hook-without-class.php
 */
add_action("init", "butterfly_insert_form");
function butterfly_insert_form() {
    ob_start();?>
    <form style="margin-top: 100px; margin-left: 100px;">
        <?php do_action('butterfly_before_form'); ?>
        <input name="username" placeholder="<?php echo apply_filters( 'butterfly_form_username', 'Username' ) ?>" />
        <input name="password" placeholder="<?php echo apply_filters( 'butterfly_form_password', 'Password' ); ?>" />
        <input value="<?php echo apply_filters( 'hooked_without_class_submit_btn', 'submit' ); ?>" type="submit" />
        <?php do_action('butterfly_after_form_submit', 30); ?>
    </form>
<?php echo ob_get_clean(); }