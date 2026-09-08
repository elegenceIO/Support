<?php
use ElegenceIO\Support\Types\Strings;

if(!function_exists("slug"))
{
    function slug(string $string)
    {
        return Strings::replace(" ","-",$string);
    }
}

if(!function_exists("dd"))
{
    function dd(array $data, bool $json=false)
    {
        $output  = "<pre>";
        $output .= ($json === false) ? json_encode($data) : var_dump($data);
        
        $output .= "</pre>";

        echo $output;
    }
}

