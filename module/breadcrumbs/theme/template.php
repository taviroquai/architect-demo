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
$breadcrumbs = view()->createBreadcrumbs();
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/breadcrumbs.php</pre>
    </div>
</div>