<?php

r('/demo/treeview', function() {
    
    $treeview = view()->createTreeView();
    $node1 = $treeview->createNode('label', 'Level 1');
    $node11 = $treeview->createNode('label', 'Level 1.1', $node1);
    $treeview->createNode('label', 'Level 1.1.1', $node11);
    $treeview->createNode('label', 'Level 2');

    $layout = l(__DIR__.'/theme/template.php')->addContent($treeview);
    c($layout);
});
