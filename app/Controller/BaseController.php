<?php

namespace Standings\Controller;

use Symfony\Component\HttpFoundation\Session\Session;

class BaseController extends \Buki\Router\Http\Controller
{
    protected $view;
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

        $fullPath = $this->className() . DIRECTORY_SEPARATOR . $path . '.twig';

        return $this->view->render($fullPath, $args);
    }

    public function className(): string
    {
        $className = (new \ReflectionClass(get_called_class()))->getName();
        $className = str_replace(['Standings\\Controller\\', 'Controller'], '', $className);

        return strtolower(str_replace('\\', DIRECTORY_SEPARATOR, $className));
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