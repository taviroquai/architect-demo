<?php

r('/demo/cart', function() {
    
    // demo of the shopping cart
    $cart = new \Demo\ViewCart();
    $cart->set('checkoutUrl', u('/demo/cart'));
    
    if (!$cart->getModel()->loadCart(app()->getSession())) {
        $item = (object) array(
            'name' => 'Product1',
            'price' => 30,
            'tax' => 0.21
        );
        // inserts on id 1 and quantity 2
        $cart->getModel()->insertItem($item, 1, 2);
    }
    
    if (i('shipping') == 'Standard') {
        $cart->getModel()->updateShippingCost(5);
    }
    
    if (i('del')) {
        $cart->getModel()->updateQuantity(i('del'), 0);
    }
    if (i('quantity')) {
        $items = i('quantity');
        foreach (array_keys($items) as $id) {
            $cart->getModel()->updateQuantity($id, (int) $items[$id]);
        }
    }
    $cart->getModel()->saveCart(app()->getSession());

    $layout = l(__DIR__.'/theme/template.php')->addContent($cart);
    c($layout);
});
