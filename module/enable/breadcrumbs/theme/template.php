<div class="well">
    <h1>Breadcrumbs Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$breadcrumbs = app()->createBreadcrumbs()
    ->parseAction(app()->input->getAction())
    ->addItem('Dummy', '#', 0);
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/breadcrumbs.php</pre>
    </div>
</div>