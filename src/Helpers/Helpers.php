<?php
namespace ElegenceIO\Support\Helpers;
use Composer\InstalledVersions;
use DirectoryIterator;
use ElegenceIO\Support\Structure\Directories;
use Exception;

class Helpers
{
    private array $helpers = [];
    private string $base = "";
    public function __construct()
    {
        $this->add(rtrim(dirname(__DIR__,2),\DIRECTORY_SEPARATOR).\DIRECTORY_SEPARATOR."Files/Helpers/");
    }

    public function add(string $path):void
    {
        $this->helpers[] = $path;
    }

    public function reload()
    {
        foreach($this->helpers as $helpers)
        {
            // Detects if the item is a file and goes to the base directory and loads all files.
            // if folder just defaults and scans the directory.
            $helper = is_file($helpers) ? dirname($helpers) : $helpers;
            
            if(!Directories::has($helper))
            {
                echo "No directory found";
            }
            
            foreach(new DirectoryIterator($helper) as $item)
            {
            if($item->isDot()) continue;
                if(!$item->isFile()) continue;
                $filepath = $item->getFileInfo();
                [$name,$ext] = explode(".",$filepath);
                $name = \ucfirst($name);

                if(!isset($this->helper[$name])){
                    $this->helpers[$name] = $filepath;
                    include_once($this->helpers[$name]);
                }
            }
        }
    }


}