<?php
namespace ElegenceIO\Support\Structure;
class Directories
{
    private string $path = "";
    
    public function __construct()
    {
        
    }

    public static function has(string $path):bool
    {
        return is_dir($path) ? true : false ;
    }


}