<?php
/**
 * Created by PhpStorm.
 * User: roi
 * Date: 11/06/16
 * Time: 12:57
 */

class lr_general_page_settings_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'lr_general_page_settings',
            __( 'General Page Settings', 'lr' ),
            array( $this, 'render_metabox' ),
            'page',
            'advanced',
            'default'
        );

    }

    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'car_nonce_action', 'car_nonce' );

        // Retrieve an existing value from the database.
        $custom_class = get_post_meta( $post->ID, 'custom_class', true );

        // Set default values.
        if( empty( $custom_class ) ) $custom_class = '';


        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="custom_class">' . __( 'Custom Class', 'lr' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="custom_class" name="custom_class" value="' . esc_attr__( $custom_class ) . '">';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name   = $_POST['car_nonce'];
        $nonce_action = 'car_nonce_action';

        // Check if a nonce is set.
        if ( ! isset( $nonce_name ) )
            return;

        // Check if a nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
            return;

        // Check if the user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;

        // Check if it's not an autosave.
        if ( wp_is_post_autosave( $post_id ) )
            return;

        // Check if it's not a revision.
        if ( wp_is_post_revision( $post_id ) )
            return;

        // Sanitize user input.
        $car_new_year = isset( $_POST[ 'custom_class' ] ) ? sanitize_text_field( $_POST[ 'custom_class' ] ) : '';


        // Update the meta field in the database.
        update_post_meta( $post_id, 'custom_class', $car_new_year );

    }
}

new lr_general_page_settings_Meta_Box;