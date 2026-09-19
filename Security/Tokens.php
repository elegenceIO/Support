<?php
namespace ElegenceIO\Support\Security;
use Exception;
class Tokens
{

    public static function set()
    {
        $token = bin2hex(random_bytes(32));
        return $token;
    }

}