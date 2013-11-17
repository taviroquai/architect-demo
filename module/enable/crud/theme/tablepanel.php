<div class="well">
    <h1>Automatic Table Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div><?=$item?></div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$config = array(
    'data_dbname'   => 'architect',
    'data_table'    => 'demo_user',
    'table_select'  => 'demo_user.*',
    'columns'       => array(
        array('type'    => 'value', 'label' => 'ID', 'property' => 'id')
    )
);
$table = app()->createAutoTable($config);
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/table/table.php</pre>
    </div>
</div>