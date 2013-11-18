<?php

r('/demo/crud', function() {
    
    $config = array(
        'table'     => 'demo_user',
        'select'    => 'demo_user.*',
        'columns'       => array(
            array('type' => 'value', 'label' => 'ID', 'property'  => 'id'),
            array('type' => 'value', 'label' => 'Email', 'property'  => 'email'),
            array('type' => 'action',   'icon'  => 'icon-edit', 
                'action' => u('/demo/crud/'), 'property' => 'id'),
            array('type' => 'action',   'icon'  => 'icon-trash', 
                'action' => u('/demo/crud/del/'), 'property' => 'id')
        )
    );
    $panel = app()->createAutoTable($config);

    $v = v(__DIR__.'/theme/tablepanel.php');
    $v->addContent('<a class="btn" href="'.u('/demo/crud/0'.'">New</a>'));
    $v->addContent($panel);
    c($v);
});

r('/demo/crud/(:num)', function($id = 0) {
    
    $config = array(
        'table'     => 'demo_user',
        'select'    => 'demo_user.*',
        'action'    => u('/demo/crud/save'),
        'items'     => array(
            array('type' => 'hidden',   'property'  => 'id'),
            array('type' => 'label',    'label' => 'Email'),
            array('type' => 'text',     'property'  => 'email'),
            array('type' => 'label',    'label' => 'Password'),
            array('type' => 'password', 'property'  => 'password'),
            array('type' => 'label',    'label' => 'Groups'),
            array('type' => 'checklist','property'  => 'id_group', 
                'class' => 'checklist inline',
                'items_table' => 'demo_group', 'prop_label' => 'name',
                'selected_items_table' => 'demo_usergroup'),
            array('type' => 'breakline'),
            array('type' => 'submit',   'label' => 'Save', 
                'class' => 'btn btn-success inline'),
            array('type' => 'button',   'label' => 'Cancel', 'action' => '#',
                'class' => 'btn inline', 'onclick' => 'window.history.back()'),
            array('type' => 'button',   'label' => 'Delete', 'property' => 'id',
                'class' => 'btn btn-danger', 'action' => u('/demo/crud/del/'))
        )
    );
    if ($id) $config['record_id'] = $id;
    $panel = app()->createAutoForm($config);

    $v = v(__DIR__.'/theme/formpanel.php');
    $v->addContent($panel);
    c($v);
});

r('/demo/crud/save', function() {
    
    // save groups
    q('demo_usergroup')->d('id_user = ?', array(p('id')))->run();
    foreach (p('id_group') as $id => $v) {
        $data = array('id_user' => p('id'), 'id_group' => $id);
        q('demo_usergroup')->i($data)->getInsertId();
    }
    
    // save user
    $data = array('email' => p('email'));
    if (p('password') != '') $data['password'] = s(p('password'));
    if (p('id') > 0) {
        q('demo_user')->u($data)->w('id = ? ', array(p('id')))->getRowCount();
    }
    else {
        q('demo_user')->i($data)->getInsertId();
    }
    
    // redirect
    app()->redirect(u('/demo/crud'));
});

r('/demo/crud/del/(:num)', function($id) {
    
    // delete user
    q('demo_usergroup')->d('id_user = ?', array($id))->getRowCount();
    q('demo_user')->d('id = ? ', array($id))->getRowCount();
    
    // redirect
    app()->redirect(u('/demo/crud'));
});

