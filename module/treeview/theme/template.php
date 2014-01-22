<div class="well">
    <h1>Tree View Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <em>Note: node type is DOMElement</em>
        <pre>
$treeview = view()->createTreeView();
$node1 = $treeview->createNode('label', 'Level 1');
$treeview->createNode('label', 'Level 1.1', $node1);
$treeview->createNode('label', 'Level 2');
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/treeview.php</pre>
    </div>
</div>