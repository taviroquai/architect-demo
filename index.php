<?php

// IMPORTANT!!! Define base path constant
define('BASE_PATH', __DIR__);
define('ARCH_PATH', '/var/www/architectphp');

// IMPORTANT!!! Require architect framework autoloader
require_once ARCH_PATH.'/src/autoload.php';
require_once ARCH_PATH.'/src/aliases.php';

// IMPORTANT!!! Give configuration file and run application
$config = "config/development.xml";
\Arch\App::Instance($config)->run();
