<?php

r('/user/install', function() {
    // initialization
    \Arch\Demo\ModelUser::checkDatabase();
});

require_once __DIR__.'/register.php';
require_once __DIR__.'/login.php';
