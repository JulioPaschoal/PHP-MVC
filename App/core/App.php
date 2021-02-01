<?php


namespace App\Core;

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parse_URL();

        //VERIFICANDO SE EIXISTE UM CONTROLLER\\
        if (file_exists('../App/controllers/' . $url[1] . '.php')) {
            $this->controller = $url[1];
            unset($url[1]);
        }
        require_once '../App/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //VERIFICANSO SE EXISTE O METODO DENTRO DO CONTROLLER\\
        if (isset($url[2])) {
            if (method_exists($this->controller, $url[2])) {
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        //EXECUTAR METODO DENTRO DO CONTROLLER\\
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    //METODO PARA PEGARA A URL E SEPARANDO PELA / \\
    public function parse_URL()
    {
        return explode('/', filter_var($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
    }
}
