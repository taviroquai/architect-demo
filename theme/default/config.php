<?php

// add custom slots besides content, css and js
$this->addSlot('topbar');

// set default template path
$this->setTemplate(conf('THEME_PATH').'/default/layout.php');

// add theme css
$base_url = conf('BASE_URL');
$this->addContent($base_url.'/theme/default/css/bootstrap.min.css', 'css');
$this->addContent($base_url.'/theme/default/css/bootstrap-responsive.min.css', 'css');
$this->addContent($base_url.'/theme/default/css/animate-custom.css', 'css');
$this->addContent($base_url.'/theme/default/css/style.css', 'css');

// add theme js
$this->addContent($base_url.'/theme/default/js/bootstrap.min.js', 'js');
$this->addContent(u('/arch/asset/js/arch.js'), 'js');

