<?php

namespace App\Http;

class Redirect
{
    public static function redirect($action)
    {
        return header("location: $action");
    }

    public static function C_redirect($controller,$action,$para)
    {
        return header("location: ../$controller/$action");
    }
}