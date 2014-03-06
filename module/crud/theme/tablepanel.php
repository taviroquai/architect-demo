<div class="well">
    <h1>Automatic Table Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div><?=$item?></div>
    <?php }); ?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$config = array(
    'table'     => 'demo_user',
    'select'    => 'demo_user.*',
    'columns'   => array(
        array('type' => 'value', 'label' => 'ID', 'property' => 'id')
    )
);
$table = view()->createAutoTable();
$table->configure($config, app()->getDatabase());
$table->setPagination(view()->createPegination());
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/table/table.php</pre>
    </div>
</div>