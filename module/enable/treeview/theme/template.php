<div class="well">
    <h1>Line Chart Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <em>Note: node type is DOMElement</em>
        <pre>
$treeview = app()->createTreeView();
$node1 = $treeview->createNode('label', 'Level 1');
$treeview->createNode('label', 'Level 1.1', $node1);
$treeview->createNode('label', 'Level 2');
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/treeview.php</pre>
    </div>
</div>