<?php

namespace App\Http;
use App\Http\Config;

class BaseController
{
    public $username = null;
    public function view($view,array $data)
    {
        return require_once Config::RESOURCES_PATH . $view . ".php";

    }

    public function layout($prime , $content)
    {
        $getLayout = file_get_contents($prime);
        print str_replace("{content}",$content,$getLayout);
    }

    public function setUserName($user)
    {
        $this->username = $user;
    }


}