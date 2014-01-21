<div class="well">
    <h1>Automatic Table Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div><?=$item?></div>
    <?})?>
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
$table = view()->createAutoTable()->setConfig($config);
$table->setDatabaseDriver(app()->getDatabase);
$table->setPagination(view()->createPegination());
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/table/table.php</pre>
    </div>
</div>