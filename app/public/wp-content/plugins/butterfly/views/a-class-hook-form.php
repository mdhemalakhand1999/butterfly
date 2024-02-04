<?php
/**
 * Its for hook-with-class.php
 */
add_action("init", "butterfly_insert_class_form", 9);
function butterfly_insert_class_form() {
    ob_start();
    echo '<h1 style="margin-top: 100px; margin-left: 100px;">'.__('A class based hooked form', 'butterfly').'</h1>';?>
    <form style="margin-top: 100px; margin-left: 100px;">
        <?php do_action('butterfly_before_class_form'); ?>
        <input name="username" placeholder="<?php echo apply_filters( 'butterfly_class_form_username', 'Username' ) ?>" />
        <input name="password" placeholder="<?php echo apply_filters( 'butterfly_form_class_password', 'Password' ); ?>" />
        <input value="<?php echo apply_filters( 'hooked_with_class', 'submit' ); ?>" type="submit" />
        <?php do_action('butterfly_form_class_submit', 30); ?>
    </form>
    <hr/><hr/><hr/>;
<?php echo ob_get_clean(); }
