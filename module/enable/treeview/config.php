<?php

r('/demo/treeview', function() {
    
    $treeview = app()->createTreeView();
    $node1 = $treeview->createNode('label', 'Level 1');
    $node11 = $treeview->createNode('label', 'Level 1.1', $node1);
    $treeview->createNode('label', 'Level 1.1.1', $node11);
    $treeview->createNode('label', 'Level 2');

    $view = v(__DIR__.'/theme/template.php')->addContent($treeview);
    c($view);
});
