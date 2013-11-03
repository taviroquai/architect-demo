<?php

r('/demo/linechart', function() {
    
    $chart = app()->createLineChart();
    $data = array(
        array("x" => "2011 W27", "y" => 100),
        array("x" => "2011 W28", "y" => 500)
    );
    $chart->set('data', $data)
            ->set('ykeys', array('y'))
            ->set('labels', array('Sells'));

    $view = v(__DIR__.'/theme/template.php')->addContent($chart);
    c($view);
});
