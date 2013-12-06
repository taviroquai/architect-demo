<div class="well">
    <h1>Automatic Form Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div><?=$item?></div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$config = array(
    'table'     => 'demo_user',
    'select'    => 'demo_user.*',
    'action'    => u('/demo/scaffolding/save'),
    'items'     => array(
        array('type' => 'hidden',   'property'  => 'id'),
        array('type' => 'label',    'label'     => 'Email'),
        array('type' => 'text',     'property'  => 'email')
    )
);
$form = app()->createAutoForm($config);
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/form/form.php</pre>
    </div>
</div>