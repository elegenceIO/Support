<?php
namespace ElegenceIO\Support\Reflection;

use ReflectionClass;
use ReflectionParameter;

class Reflect
{
    private ReflectionClass $reflection;
    
    public function __construct(string $class)
    {
        $this->reflection = new ReflectionClass($class);
    }

    public static function create(string $class,bool $autoWire = true):object
    {
        $reflect = new ReflectionClass($class);

        if($autoWire === false)
        {
            return $reflect;
        }

        if(!$reflect->isInstantiable())
        {
              if($reflect->isAbstract())
            {
                // throw error for abstract item
            }

            if($reflect->isInterface())
            {
                // throw interface error.
            }
            
        }

        $constructor = $reflect->getConstructor();

        if(\is_null($constructor))
        {
            return new $class();
        }

        $dependencies = array_map(
        fn(ReflectionParameter $params) => $this->getParams($params)
        ,$constructor->getParameters()
        );

        return $reflect->newInstanceArgs($dependencies);
    }

    public static function instantiable() : bool {
        return ($this->reflection->isInstantiable())? true : false;
    }

    public function abstract():bool
    {
        return ($this->reflection->isAbstract()) ? true : false;
    }

    public function enum():bool
    {
        return ($this->reflection->isEnum()) ? true : false;
  
    }

    public function interface():bool
    {
        return ($this->reflection->isInterface()) ? true : false;
    }

    public function final() : bool {
        return ($this->reflection->isFinal()) ? true : false;
    }

    public function instance(object $object) :bool {
        return ($this->reflection->isInstance($object)) ? true  : false;
    }


    // Private methods

     // Dummpy reflction injection code()

    protected  function injectContainer():object
    {
        if(!$this->instantiable())
        {
            if($this->abstract())
            {
                // throw error for abstract item
            }

            if($this->Interface())
            {
                // throw interface error.
            }
            
        }

        // Get Constructor 
        $constructor = $this->reflection->getConstructor();

        if(\is_null($constructor))
        {
            return new $class();
        }

        $dependencies = $this->resolveParams($constructor->getParameters());
        return $this->reflection->newInstanceArgs($dependencies);
    }

    private function resolveParams($params)
    {
        return array_map(fn(ReflectionParameter $params=>$this->getParams,$params));
    }
    
    private function getParams(ReflectionParameter $params)
    {
        $type = $params->gettype();
        if(is_null($params) || $type->isBuiltin())
        {
            if($params->isDefaultValueAvailable())
            {
                return $params->isDefaultValueAvailable();
            }
            // throw error

        }

        return $this->call($type->getName());
    }


}