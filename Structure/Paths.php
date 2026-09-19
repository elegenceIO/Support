<?php
namespace ElegenceIO\Support\Structure;
use ElegenceIO\Support\Types\Strings;
use ElegenceIO\Support\Types\Arrays;


class Paths
{
    public static function Gaurd(string $path)
    {

    }

    public static function normalise(string $path):string
    {
        // Convert paths which use backslash into forward slash
        $path = Strings::replace("\\","/",$path);
        $isAbsolutePath = Strings::starts($path,"/");
        // Explode the Path into Segments
        $segments = Strings::split($path,"/");
        $result = [];

        foreach($segments as $segment)
        {
            if($segment === '' || $segment === ".") continue;
            
            if($segment === "..")
            {
                if(!empty($result) && Arrays::end($result) !== "..")
                {
                    Arrays::pop($result);
                }
                elseif(!$isAbsolutePath)
                {
                    $result[] = "..";
                }
            
                continue;
            }
            
            
            $result[] = $segment;
        }
        $path = Strings::join($result,"/");
        return ($isAbsolutePath ? '/' : '') . $path;
    }

    public static function withBase(string $path,?string $base=null)
    {

    }
}