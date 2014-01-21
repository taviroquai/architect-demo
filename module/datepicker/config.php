<?php

r('/demo/datepicker', function() {
    
    $datepicker = view()->createDatePicker();
    $datepicker->set('value', date('Y-m-d', time() + 60*60*24));

    $layout = l(__DIR__.'/theme/template.php')->addContent($datepicker);
    c($layout);
});
