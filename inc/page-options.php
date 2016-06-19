<?php
/**
 * Created by PhpStorm.
 * User: roi
 * Date: 19/06/16
 * Time: 23:29
 */
add_action( 'admin_menu', 'lr_add_admin_menu' );
add_action( 'admin_init', 'lr_settings_init' );


function lr_add_admin_menu(  ) {

    add_options_page( 'LR - Options', 'LR - Options', 'manage_options', 'lr', 'lr_options_page' );

}


function lr_settings_init(  ) {

    register_setting( 'pluginPage', 'lr_settings' );


    add_settings_section(
        'lr_pluginPage_section',
        __( 'General Settings', 'lr' ),
        'lr_settings_section_callback',
        'pluginPage'
    );


    add_settings_field(
        'email',
        __( 'Email', 'lr' ),
        'email_render',
        'pluginPage',
        'lr_pluginPage_section'
    );


}



function email_render(  ){
    $options = get_option( 'lr_settings' ); ?>
    <input type='email' name='lr_settings[email]' value='<?php echo $options['email']; ?>'>
<?php }



function lr_settings_section_callback(  ) {

}


function lr_options_page(  ) { ?>
    <form action='options.php' method='post'>
        <h2><?php _e('Settings','lr'); ?></h2>

        <?php settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button(); ?>
    </form>
<?php } ?>