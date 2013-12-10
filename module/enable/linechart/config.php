<?php

r('/demo/linechart', function() {
    
    $chart = view()->createLineChart();
    $data = array(
        array("x" => "2011 W27", "y" => 100),
        array("x" => "2011 W28", "y" => 500)
    );
    $chart->set('data', $data);
    $chart->set('labels', array('Sells'));

    $layout = l(__DIR__.'/theme/template.php')->addContent($chart);
    c($layout);
});
