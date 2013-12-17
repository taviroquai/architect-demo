<?php

// IMPORTANT!!! Require composer autoload
require_once 'vendor/autoload.php';
require_once 'vendor/taviroquai/architectphp/aliases.php';

// IMPORTANT!!! Give configuration file and run application
$config = "config/development.xml";
$arch = new \Arch\App();
$arch->getConfig()->load($config);
$arch->run();
