<div class="well">
    <h1>Shopping Cart Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?php }); ?>
</div>