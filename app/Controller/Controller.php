<?php

namespace Standings\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class Controller extends \Buki\Router\Http\Controller
{
    private $view;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(APP_PATH.'/views/');
        $this->view = new \Twig\Environment($loader, [
            'cache' => APP_PATH . '/storage/cache/views',
            'auto_reload' => true,
            'debug'=>true
        ]);
        $this->view->addExtension(new \Twig\Extension\DebugExtension());
        $this->view->addFunction(new \Twig\TwigFunction('strtotime', 'strtotime'));
        $this->view->addFunction(new \Twig\TwigFunction('ondisk', function($args){
            return file_exists(APP_PATH . '/public/' . $args);
        }));
    }

    public function view($path, $args=[])
    {
        $args['className'] = $this->className();
        $args['user'] = session('user');

        $args['flash'] = (new Session())->getFlashBag()->all();

        return $this->view->render($this->className() . '/' . $path . '.twig', $args);
    }

    public function className(): string
    {
        $className = strtolower((new \ReflectionClass(get_called_class()))->getShortName());
        return str_replace('controller', '', $className);
    }


    public function debug($args, $exit=true, $preFormatted=true)
    {
        if($preFormatted)
            echo '<pre>';
        if(is_bool($args) || is_null($args)) {
            var_dump($args);
        } else {
            print_r($args);
        }
        if($preFormatted)
            echo '</pre>';
        if($exit)
            exit;
    }

}