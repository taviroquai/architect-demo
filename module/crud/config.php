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
    
    try {
        
        $database = app()->getDatabase();
        $panel = view()->createAutoTable();
        $panel->configure($config, $database);
        $pagination = view()->createPagination();
        $pagination->setLimit(2);
        $pagination->parseCurrent(app()->getInput());
        $panel->setPagination($pagination);
        
    } catch (\Exception $e) {
        $panel = '';
    }

    $layout = l(__DIR__.'/theme/tablepanel.php');
    $layout->addContent('<a class="btn" href="'.u('/demo/crud/0'.'">New</a>'));
    $layout->addContent($panel);
    c($layout);
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
    
    try {
        $database = app()->getDatabase();
        $panel = view()->createAutoForm();
        $panel->configure($config, $database);
    } catch (\Exception $e) {
        $panel = '';
    }
    
    $layout = l(__DIR__.'/theme/formpanel.php');
    $layout->addContent($panel);
    c($layout);
});

r('/demo/crud/save', function() {
    
    // filter and get input
    filter('id', FILTER_SANITIZE_NUMBER_INT);
    filter('id_group', FILTER_SANITIZE_NUMBER_INT);
    $id = i('id');
    $id_group = i('id_group');
    
    // save user
    $data = array('email' => i('email'));
    if (i('password') != '') $data['password'] = s(i('password'));
    if ($id > 0) {
        q('demo_user')->u($data)->w('id = ? ', array($id))->getRowCount();
    }
    else {
        $id = q('demo_user')->i($data)->getInsertId();
    }
    
    // save groups
    q('demo_usergroup')->d('id_user = ?', array($id))->run();
    foreach ($id_group as $gid => $v) {
        $data = array('id_user' => $id, 'id_group' => $gid);
        q('demo_usergroup')->i($data)->getInsertId();
    }
    
    // redirect
    redirect(u('/demo/crud'));
});

r('/demo/crud/del/(:num)', function($id) {
    
    // delete user
    q('demo_usergroup')->d('id_user = ?', array((int)$id))->getRowCount();
    q('demo_user')->d('id = ? ', array((int)$id))->getRowCount();
    
    // redirect
    redirect(u('/demo/crud'));
});

