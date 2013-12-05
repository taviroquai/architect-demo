<?php

r('/demo/datepicker', function() {
    
    $datepicker = app()->createDatePicker();
    $datepicker->set('value', date('Y-m-d', time() + 60*60*24));

    $view = v(__DIR__.'/theme/template.php')->addContent($datepicker);
    c($view);
});
