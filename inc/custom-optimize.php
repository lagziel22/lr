<?php
/**
 * Created by PhpStorm.
 * User: roi
 * Date: 05/05/16
 * Time: 22:14
 */

function lr_remove_junk(){
    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version

    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action('init','lr_remove_junk');


// Remove comment-reply.min.js from footer
function crunchify_clean_header_hook(){
    wp_deregister_script( 'comment-reply' );
}
add_action('init','crunchify_clean_header_hook');


// Remove jQuery Migrate & jQuery Script
function remove_jquery_migrate() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('init', 'remove_jquery_migrate');

// Disable Embeds- https://wordpress.org/plugins/disable-embeds/
require_once 'custom-optimize/disable-embeds.php';


//* Disable Emojis - https://he.wordpress.org/plugins/disable-emojis/
require_once 'custom-optimize/disable-emojis.php';

// Remove Query Strings From Static Resources - https://he.wordpress.org/plugins/remove-query-strings-from-static-resources/
require_once 'custom-optimize/remove-query-strings.php';

