<?php

// twig autoloader php file.
$config['autoloader'] = '/home/harry/workspaces/www/phplibs/Twig/lib/Twig/Autoloader.php';

// When set to true, the generated templates have a __toString() method 
// that you can use to display the generated nodes 
$config['debug'] = true;

// cache path, false to disable caching.
//$config['cache'] = false;
$config['cache'] = '/tmp/ptool';

$config['template_dirs'] = array(APPPATH . 'views');
