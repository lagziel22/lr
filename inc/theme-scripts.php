<?php

function lr_scripts() {

    /* - - - - styles - - - - - */
    /* cdn */
    wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css' );
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );


    /* - - - - styles (end) - - - - - */

    /* - - - -  js  - - - - - */
    wp_enqueue_script( 'jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js', array(), '',true );
    wp_enqueue_script( 'jquery-ui-js', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array('jquery-cdn'), '',true );
    wp_enqueue_script( 'bootstrapi-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '',true );

    /* - - - - js (end) - - - - - */



    // custom
    wp_enqueue_script( 'woocommerce-custom', '/wp-content/plugins/lr/custom-plugins/woocommerce/woocommerce.js', array('jquery-cdn'), '',true );

}

add_action( 'wp_enqueue_scripts', 'lr_scripts' );
