<div class="well">
    <h1>Shopping Cart Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$cart = app()->createCart();
$item = (object) array('name' => 'Product1', 'price' => 30, 'tax' => 0.21);
$cart->model->insertItem($item, 1, 2); // inserts on id 1 and quantity 2
$cart->model->updateShippingCost(5); // updates shipping cost to 5
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/cart.php</pre>
    </div>
</div>