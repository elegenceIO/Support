<?php
namespace ElegenceIO\Support\Types;

class Arrays
{

    public static function is(mixed $value):bool
    {
        return (\is_array($value)) ? true : false ;
    }

    public static function in(mixed $needle,array $haystack):bool
    {
        return (\in_array($needle,$haystack)) ? true : false;
    }

    public static function exists(string $key,array $array):bool
    {
        return array_key_exists($key,$array)? true : false; 
    }

    public static function empty(array $array):bool
    {
        return empty($array) ? true : false;
    }

    public static function merge(array $src,array $data,bool $recursive=false):array
    {
        if($recursive)
        {
            return array_merge_recursive($src,$data);
        }

        return array_merge($src,$data);
    }

    public static function replace(array &$src,array &$data,bool $recursive=false):array
    {
        if($recursive)
        {
            return array_replace_recursive($src,$data);
        }

        return array_replace($src,$data);
    }

    public static function shift(array &$array):mixed
    {
        return array_shift($array);
    }

    public static function pop(array &$array):mixed
    {
        return array_pop($array);
    }
    
    public static function end(array &$array):mixed
    {
        return end($array);
    }

    
}