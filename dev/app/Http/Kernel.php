<?php

namespace App\Http;
use App\Http\Config;
class Kernel
{
    public $controller =null;
    public $action =null;
    public $params = [];
     public function __construct()
    {
        $url = $this->parseUrl();//[login,auth,12]
        $formatUrl = ucfirst($url[0]). "Controller";

        if (isset($url[0])){
            if (file_exists(Config::CONTROLLERS_PATH . $formatUrl . ".php")){
                $this->controller = $formatUrl;
                unset($url[0]);
            }
        }
        require_once Config::CONTROLLERS_PATH . $this->controller . ".php";
        $this->controller = new $this->controller;
        if(isset($url[1])){
            if (method_exists($this->controller,$url[1])){
                $this->action = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [""];
        call_user_func_array([$this->controller,$this->action],$this->params);
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])){
            return explode("/",rtrim($_GET['url'],"/"));
        }
    }
}