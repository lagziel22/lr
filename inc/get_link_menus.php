<?php
/**
 * Created by PhpStorm.
 * User: roi
 * Date: 24/03/16
 * Time: 10:24
 */

function lr_get_link_menus($attr_title){
    $locations =	get_nav_menu_locations();
    $menu =			wp_get_nav_menu_object( $locations[ 'links_menu' ] );
    $menu_items =	wp_get_nav_menu_items( $menu->term_id, array('order' => 'DESC'));
    foreach ($menu_items as $key => $val) {
        if($val->attr_title == $attr_title){
            return $val->url;
        }
    }
    return null;
}

add_action( 'after_setup_theme', 'register_links_menu' );
function register_links_menu() {
    register_nav_menu( 'links_menu', __( 'Links Menu', 'begincenter' ) );
}
