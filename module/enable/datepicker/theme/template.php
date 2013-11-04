<div class="well">
    <h1>Date Picker Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$datepicker = app()->createDatePicker()
    ->set('default', date('Y/m/d', time() + 60*60*24));
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/datepicker.php</pre>
    </div>
</div>