<?php

r('/user/install', function() {
    // initialization
    \Demo\ModelUser::checkDatabase();
});

require_once __DIR__.'/register.php';
require_once __DIR__.'/login.php';

e('arch.session.after.load', function () {
    app()->session = new \Demo\Session();
    app()->session->load();
});

e('arch.session.after.save', function () {
    app()->session->save();
});