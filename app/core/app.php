<?php

namespace MVC\core;

class app
{
    private $controller;
    private $method;
    private $params;
    public function __construct()
    {
        $this->url();
        $this->render();
    }
    private function url()
    {
        if (!empty($_SERVER['QUERY_STRING'])) {


            $url = explode('/', $_SERVER['QUERY_STRING']);
            $this->controller = isset($url[0]) ? $url[0] . 'Controller' : 'homeController';
            $this->method = isset($url[1]) ? $url[1] : 'index';
            unset($url[0], $url[1]);
            $this->params = array_values($url);

            // print_r($this->params);
            // print_r($url);
        } else {
            $this->controller = 'homeController';
            $this->method = 'index';
            $this->params = array_values([]);
        }

        // print_r($url);
    }
    private function render()
    {
        $controller = 'MVC\controllers\\' . $this->controller;
        if (class_exists($controller)) {
            $controller = new $controller;
            if (method_exists($controller, $this->method)) {
                call_user_func_array([new $controller, $this->method], $this->params);
            } else {
                echo " method not found";
            }
        } else {
            echo "class not found";
        }
    }
}
