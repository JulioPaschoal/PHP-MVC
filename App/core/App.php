<?php

namespace App\Core;

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        print_r($url = $this->parse_url());

        //VERIFICANDO SE EXISTE UM CONTROLLER\\
        if (file_exists('../App/controllers/' . $url[1] . '.php')) :
            $this->controller = $url[1];
            unset($url[1]);
        endif;
    }

    //METODO PRA PEGAR A URL\\
    public function parse_url()
    {
        return explode('/', filter_var($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
    }
}
