<?php
namespace ElegenceIO\Support\Structure;

use ElegenceIO\Support\Types\Strings;
use ElegenceIO\Support\Types\Arrays;

class Gaurd
{

// Get RealPath


// Normalise
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

// Within Base

public static function withinBase(string $basepath,string $path)
{

}

}