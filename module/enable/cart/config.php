<?php

r('/demo/cart', function() {
    
    // demo of the shopping cart
    $cart = app()->createCart();
    $cart->set('checkoutUrl', u('/demo/cart'));
    // if you use other item attributes please extend Model_Cart, View_Cart, 
    // copy template theme/default/cart.php and change attributes
    $item = (object) array('name' => 'Product1', 'price' => 30, 'tax' => 0.21);
    $cart->model->insertItem($item, 1, 2); // inserts on id 1 and quantity 2
    $cart->model->updateQuantity(1, 3); // updates item 1 quantity to 3
    $cart->model->updateShippingCost(5); // updates shipping cost to 5
    
    if (g('del')) {
        $cart->model->updateQuantity(g('del'), 0);
    }
    if (p('quantity')) {
        $items = p('quantity');
        foreach (array_keys($items) as $id) {
            $cart->model->updateQuantity($id, (int) $items[$id]);
        }
    }

    $view = v(__DIR__.'/theme/template.php')->addContent($cart);
    c($view);
});
