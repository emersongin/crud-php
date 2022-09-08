<?php

class Rota {
    private $url = '';
    private $controlador = '';
    private $metodo = "index";
    private $parametros = [];

    public function __construct() {
        $this->url = $this->url() ? $this->url() : [0];

        $this->controlador = $this->controllerExists($this->url[0]);
        $this->requiredController($this->controlador);

        $this->controlador = new $this->controlador;

        if(isset($this->url[1]) && method_exists($this->controlador, $this->url[1])) {
            $this->metodo = $this->url[1];
            unset($this->url[1]);

        }

        $this->parametros = $this->url ? array_values($this->url) : [];
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
    }

    protected function controllerExists($controllerName) {
        if(file_exists('../app/controller/' . ucwords($controllerName) . '.php')) {
            return ucwords($controllerName);
        }

        return "Pages";
    }

    protected function requiredController($controller) {
        require_once '../app/controller/' . $controller . '.php';
    }

    public function url() {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

        if (isset($url)) {
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);

            return $url;
        }

        return [];
    }
}
