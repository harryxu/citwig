<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$ci =& get_instance();
$ci->config->load('twig', true);

require_once $ci->config->item('autoloader', 'twig');
Twig_Autoloader::register();

require_once dirname(__FILE__) . '/twig_extensions.php';

class Twig 
{

    protected $twig;

    function __construct()
    {
        $ci =& get_instance();
        $loader = new Twig_Loader_Filesystem($ci->config->item('template_dirs', 'twig'));
        $this->twig = new Twig_Environment($loader, array(
            'cache' => $ci->config->item('cache', 'twig'),
            'debug' => $ci->config->item('debug', 'twig'),
        ));

        $this->twig->addExtension(new CI_Twig_Extension());
    }

    public function render($template, $data = array())
    {
        $t = $this->twig->loadTemplate($template);
        echo $t->render($data);
    }
}
