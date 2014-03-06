<div class="well">
    <h1>Automatic Form Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div><?=$item?></div>
    <?php }); ?>
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
$form = view()->createAutoForm();
$form->configure($config, app()->getDatabase());
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/form/form.php</pre>
    </div>
</div>