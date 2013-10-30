<?php

app()->theme
	->setPath(BASE_PATH.'/theme/default/layout.php')
	->addSlot('topbar');

// add theme css
c(BASE_URL.'/theme/default/css/bootstrap.min.css', 'css');
c(BASE_URL.'/theme/default/css/bootstrap-responsive.min.css', 'css');

// add theme js
c(BASE_URL.'/theme/default/js/bootstrap.min.js', 'js');
c(u('/arch/asset/js/arch.js'), 'js');

