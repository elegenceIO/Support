<?php

use ElegenceIO\Containers\ContainerRegistry;

// App Entry Point


/**
 * Default Container Helper Required for containers to function correctly.
 * @return object|ContainerRegistry
 */
if (!\function_exists("app")) {

    function app(?string $abstract = null)
    {
        $container = ContainerRegistry::get();
        return (is_null($abstract)) ? $container : $container->make($abstract); 
    }
}

if(!function_exists("basepath"))
{
    function basepath(?string $paths=null)
    {
        if(!app()->has("basepath"))
        {
            throw new Exception("basepath helper cannot be found");
        }

        $app = app("basepath");
        return is_null($paths)  ? $app : $app.$paths; 
    
    }
}




