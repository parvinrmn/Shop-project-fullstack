<?php

namespace App\Http;

class Session
{
    private static $instance = null;
//ino yadet bashe bardari//////////////////
    private function __construct()
    {
        if (isset($_session)){
            session_start();
        }
    }

    public static function sess()
    {
        self::$instance = new Self;
        return self::$instance;
    }
    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false ;
    }
    public static function set($key,$val)
    {
        return $_SESSION[$key] = $val;

    }

    public static function remove()
    {
        session_unset();
        session_destroy();
        return true;
    }



}