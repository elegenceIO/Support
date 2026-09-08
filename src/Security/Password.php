<?php
namespace ElegenceIO\Support\Security;

class Password
{

    public static function set(string $password,string $algo=PASSWORD_DEFAULT)
    {
       return  password_hash($password,$algo);
    }

    public function validate(string $input,string $src)
    {
        return password_verify($input,$src);
    }

    public function needRehash(string $hash,string $algo=PASSWORD_DEFAULT)
    {
        return password_needs_rehash($hash,$algo);
    }
    

}