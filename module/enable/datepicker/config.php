<?php

r('/demo/datepicker', function() {
    
    $datepicker = app()->createDatepicker();
    $datepicker->set('default', date('Y/m/d', time() + 60*60*24));

    $view = v(__DIR__.'/theme/template.php')->addContent($datepicker);
    c($view);
});
