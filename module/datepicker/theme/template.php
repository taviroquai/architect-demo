<div class="well">
    <h1>Date Picker Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?php }); ?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$datepicker = view()->createDatePicker()
    ->set('name', 'input_name')
    ->set('value', date('Y/m/d', time() + 60*60*24));
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/datepicker.php</pre>
    </div>
</div>