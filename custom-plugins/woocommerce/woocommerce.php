<?php
/**
 * Created by PhpStorm.
 * User: roi
 * Date: 28/05/16
 * Time: 17:24
 */



add_action( 'wp_ajax_lr_add_to_cart', 'lr_add_product_to_cart' );
add_action( 'wp_ajax_nopriv_lr_add_to_cart', 'lr_add_product_to_cart' );
function lr_add_product_to_cart() {
    global $woocommerce;
    $product_id =  intval($_POST['product_id']);
    $product_quantity =  (intval($_POST['product_quantity'])) ? (intval($_POST['product_quantity'])) : 1;
    $woocommerce->cart->add_to_cart($product_id, $product_quantity);
    echo $woocommerce->cart->get_cart_contents_count();
    die();
}

add_action( 'wp_ajax_lr_remove_from_cart', 'lr_remove_product_from_cart' );
add_action( 'wp_ajax_nopriv_lr_remove_from_cart', 'lr_remove_product_from_cart' );
function lr_remove_product_from_cart() {
    global $woocommerce;
    // Set the product ID to remove
    $prod_to_remove = intval($_POST['product_id']);
    $amount_products_deleted = intval($_POST['amount_products_deleted']);

    // Cycle through each product in the cart
    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
        // Get the Variation or Product ID
        $prod_id = $cart_item['product_id'];
        // Check to see if IDs match
        if( $prod_to_remove == $prod_id ) {
            if($amount_products_deleted){
                $woocommerce->cart->set_quantity( $cart_item_key, $cart_item['quantity'] - 1, true  );
            }else{
                $woocommerce->cart->set_quantity( $cart_item_key, 0, true  );
            }
            break;
        }
    }
    echo json_encode(array(
        'cart_contents_count' => $woocommerce->cart->get_cart_contents_count(),
        'cart_subtotal' => $woocommerce->cart->get_cart_subtotal(),
        'total' => $woocommerce->cart->get_cart_total(),
    ));
    die();
}



// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );