<?php
namespace ElegenceIO\Support\Structure;

class Files
{
    private string $path = "";
    public static function construct()
    {

    }
    
    public static function is(string $path):bool
    {
        return is_file($path) ? true : false;
    } 

    public static function has(string $path):bool
    {
        return \file_exists($path)? true : false;
    }

    public function fileInfo(string $path):string
    {
        return \pathinfo($path,\PATHINFO_FILENAME);
    }

}