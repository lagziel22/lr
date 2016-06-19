<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
Plugin Name: LR - Functional
Description: Functional
Author: Roi Lagziel
Version: 1.0.0
*/

/**
 * Enqueue scripts and styles.
 */
require_once 'inc/theme-scripts.php';

/**
 * Custom Fields
 */

require_once 'inc/custom-fields.php';


/**
 * Relative URL
 */

require_once 'inc/relative-url.php';



/**
 * Custom plugings
 */

require_once 'custom-plugins/woocommerce/woocommerce.php';



/**
 * Custom optimize
 */
require_once 'inc/custom-optimize.php';

/**
 * get links
 */

require_once 'inc/get_link_menus.php';


/**
 * configure
 */

require_once 'inc/configure.php';