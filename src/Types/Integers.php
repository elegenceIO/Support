<?php
namespace ElegenceIO\Support\Types;

class Integers
{

/**
 *  @property mixed $value
 *  @return bool
 *  @method is();
 *  @desctiption converts string into array
 */  
    public static function is(mixed &$value):bool
    {
        return is_int($value) ? true : false ;
    }

}