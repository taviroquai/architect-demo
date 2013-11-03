<?php

// add custom slots besides content, css and js
$this->addSlot('topbar');

// set default template path
$this->setTemplate(THEME_PATH.'/default/layout.php');

// add theme css
$this->addContent(BASE_URL.'/theme/default/css/bootstrap.min.css', 'css');
$this->addContent(BASE_URL.'/theme/default/css/bootstrap-responsive.min.css', 'css');
$this->addContent('http://fonts.googleapis.com/css?family=Quicksand', 'css');
// add theme js
$this->addContent(BASE_URL.'/theme/default/js/bootstrap.min.js', 'js');
$this->addContent(u('/arch/asset/js/arch.js'), 'js');

