/**
 * Created by roi on 28/05/16.
 */


$('.single_add_to_cart_button').on('click',function () {
    var data = {
        action: 'lr_add_to_cart',
        product_id: $(this).attr('data-product-id'),
        product_quantity: $(this).attr('data-product-quantity')
    };
    $.post('/wp-admin/admin-ajax.php' , data, function(response) {
        lr_add_to_cart_response_custom(response, data);
    });
});

$('.single_remove_from_cart_button').on('click',function () {
    var data = {
        action: 'lr_remove_from_cart',
        product_id: $(this).attr('data-product-id'),
        amount_products_deleted: $(this).attr('data-amount-products-deleted')
    };
    $.post('/wp-admin/admin-ajax.php' , data, function(response) {
        lr_remove_from_cart_response_custom(response, data)
    });
});



