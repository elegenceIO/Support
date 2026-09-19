<?php
namespace ElegenceIO\Support\Requests;

class Requests
{
    
    public static function isConsole()
    {
        return \php_sapi_name() === "cli" ? true : false;
    }

    
}