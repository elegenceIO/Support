<?php
namespace ElegenceIO\Support\Structure;

class Permissions 
{
/**
 *  @property string $path
 *  @return bool
 *  @method writable();
 *  @desctiption checks if path is writable
 */  
    protected static function  writable(string $path):bool
    {
        return is_writeable($path)? true : false;
    }

/**
 *  @property string $path
 *  @return bool
 *  @method rad();
 *  @desctiption checks if path is readable
 */  
    protected static function readable(string $path):bool
    {
        return is_readable($path)? true : false;
    }

/**
 *  @property string $path
 *  @return bool
 *  @method executable();
 *  @desctiption checks if path is executable
 */  
    protected static function executable(string $path):bool
    {
        return is_executable($path)? true : false;
    }
    
}