<?php

r('/demo/crud/user/(:num)/edit', function($id) {
    $user = q('demo_user')->s()->w('id = ? ', array($id))->fetchObject();
    $data = array('user' => $user);
    $v = new \Arch\View(THEME_PATH.'/demo/userform.php', $data);
    o($v);
});

r('/demo/crud/user/list', function() {
    $data = array('users' => q('demo_user')->s()->fetchAll());
    $v = new \Arch\View(THEME_PATH.'/demo/userlist.php', $data);
    o($v);
});

r('/demo/crud/user/(:num)/group/list', function($id) {
    $groups = q('demo_group')->s()->fetchAll();
    $selected = q('demo_usergroup')
        ->s('id_group')
        ->w('id_user = ?', array($id))
        ->fetchColumn();
    $data = array('groups' => $groups, 'selected' => $selected);
    $v = new \Arch\View(THEME_PATH.'/demo/grouplist.php', $data);
    o($v);
});

r('/demo/crud/user/save', function() {
    $result = array('result' => true, 'id' => null);
    $data = array('email' => p('email'));
    if (p('password') != '') $data['password'] = s(p('password'));
    if (p('id') > 0) {
        q('demo_user')->u($data)->w('id = ? ', array(p('id')))->run();
        $result['id'] = p('id');
    }
    else {
        $result['id'] = q('demo_user')->i($data)->getInsertId();
    }    
    j($result);
});

r('/demo/crud/user/(:num)/delete', function($id) {
    $result = array('result' => true, 'id' => $id);
    q('demo_usergroup')->d('id_user = ?', array($id))->run();
    q('demo_user')->d('id = ? ', array($id))->run();
    j($result);
});

r('/demo/crud/user/save/group', function() {
    q('demo_usergroup')->d('id_user = ?', array(p('id_user')))->run();
    $groups = p('id_group');
    foreach ($groups as $id) {
        $data = array('id_user' => p('id_user'), 'id_group' => $id);
        q('demo_usergroup')->i($data)->run();
    }
    j(array('result' => true, 'data' => p()));
});
