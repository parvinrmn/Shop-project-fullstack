<?php

namespace App\Http;
class Request
{
    public static function getparam($request)
    {
        return $_GET[$request] ?? $_POST[$request];

    }
}