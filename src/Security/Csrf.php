<?php
namespace ElegenceIO\Support\Security;

use Exception;
use ElegenceIO\Support\Security\Hashing;
use ElegenceIO\Support\Security\Tokens;

class Csrf
{
    
    public static function generate()
    {
        $token = Tokens::set();
        return session()->put("_csrf",$token);
    }

    public static function verify(string $input):bool
    {
        $token = session()->get("_csrf");
        if(!Hashing::validate($input,$token))
        {
            throw new Exception("Invalid Csrf Token");
        }
        
        return true;
    }
}