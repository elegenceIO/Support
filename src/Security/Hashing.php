<?php
namespace ElegenceIO\Support\Security;

class Hashing
{
    public static function set(string $data,string $algo='sha256')
    {
        return hash($algo,$data);
    }

    public static function validate(string $value,string $input)
    {
        return hash_equals($value,$input);
    }

    public function setHmac(string $data,string $key,string $algo,bool $binary=false):string {
        return hash_hmac($algo,$data.$key,$binary);
    }

}