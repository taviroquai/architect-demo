<div class="well">
    <h1>Line Chart Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$data = array(
    array("x" => "2011 W27", "y" => 100),
    array("x" => "2011 W28", "y" => 500)
);
$chart = view()->createLineChart()
    ->set('data', $data)
    ->set('labels', array('Sells'));
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/linechart.php</pre>
    </div>
</div>