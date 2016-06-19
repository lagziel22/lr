<?php
/**
 * Created by PhpStorm.
 * User: roi
 * Date: 03/06/16
 * Time: 16:29
 */

function lr_configure_page_for_archive(){
    if(is_archive()){
        global $page_of_archive;
        $page_of_archive = get_page_by_path(get_post_type_object( get_post_type() )->rewrite['slug']);
    }
}

function lr_get_content_page_for_archive(){
    if (is_archive()) {
        global $page_of_archive;
        $content = $page_of_archive->post_content;
        $content = apply_filters('the_content', $content);
        return str_replace(']]>', ']]&gt;', $content);
    }
    return '';
}

function lr_get_id_page_for_archive(){
    if (is_archive()) {
        global $page_of_archive;
        return $page_of_archive->ID;
    }
    return get_the_ID();
}
add_action( 'template_redirect', 'lr_configure_page_for_archive' );

