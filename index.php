<?php

// IMPORTANT!!! Require composer autoload
require_once 'vendor/autoload.php';

// IMPORTANT!!! Give configuration file and run application
$config = "config/development.xml";
$app = \Arch\App::Instance($config)
        ->aliases()
        ->run();
