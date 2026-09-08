<?php
namespace ElegenceIO\Support\Types;

class Strings
{
     
/**
 *  @property mixed $value
 *  @return bool
 *  @method is();
 *  @desctiption Validates if value is a string.
 */
    public static function is(mixed $value):bool
    {
        return is_string($value) ? true : false ;
    }

/**
 *  @property string $haystack
 *  @property string $needle
 *  @return bool
 *  @method contains();
 *  @desctiption Validates if string $haystack contains a value of $needle
 */
    public static  function contains(string $haystack,string $needle):bool
    {
        return str_contains($haystack,$needle) ? true : false;
    }

/**
 *  @property string $haystack
 *  @property string $needle
 *  @return bool
 *  @method starts();
 *  @desctiption Validates if string $haystack starts with a value of $needle
 */
    public static  function starts(string $haystack,string $needle):bool
    {
        return str_starts_with($haystack,$needle) ? true : false;
    }

        /**
 *  @property string $haystack
 *  @property string $needle
 *  @return bool
 *  @method ends();
 *  @desctiption Validates if string $haystack ends a value of $needle
 */
    public static function ends(string $haystack,string $needle):bool
    {
        return str_ends_with($haystack,$needle) ? true : false;
    }

    /**
 *  @property string $search
 *  @property string $replace
 *  @property string $subject
 *  @return string
 *  @method replace();
 *  @desctiption Replace a $searched value with a Specfic input
 */
    public static function replace(string $search,string $replace,string $subject):string
    {
        return str_replace($search,$replace,$subject);
    }

    /**
 *  @property string $string
 *  @return string
 *  @method lower();
 *  @desctiption covert text to lower;
 */  
    public static function lower(string $string):string
    {
        return strtolower($string);
    }

        /**
 *  @property string $string
 *  @return string
 *  @method upper();
 *  @desctiption covert text to upper;
 */  
    public static function upper(string $string):string
    {
        return strtoupper($string);
    }

        /**
 *  @property string $string
 *  @return int
 *  @method lenght();
 *  @desctiption obtain the string lenght
 */  
    public static function length(string $string):int
    {
        return strlen($string);
    }


        /**
 *  @property string $string
 *  @property string $mask
 *  @return string
 *  @method trim();
 *  @desctiption trim Values
 */  
    public static function trim(string $string,string $mask = " \t\n\r\0\x0B"):string
    {
        return trim($string,$mask);
    }


           /**
 *  @property string $string
 *  @property string $mask
 *  @return string
 *  @method ltrim();
 *  @desctiption trim Values from the left
 */  
    public static  function ltrim(string $string,string $mask = " \t\n\r\0\x0B"):string
    {
        return ltrim($string,$mask);
    }

/**
 *  @property string $string
 *  @property string $mask
 *  @return string
 *  @method rtrim();
 *  @desctiption trim Values
 */  
    public static  function rtrim(string $string,string $mask = " \t\n\r\0\x0B"):string
    {
        return rtrim($string,$mask);
    }

/**
 *  @property string $string
 *  @property string $delimeter
 *  @return array
 *  @method split();
 *  @desctiption converts string into array
 */  
    public static  function split(string $string,string $delimiter):array
    {
        return explode($delimiter,$string);
    }


/**
 *  @property string $string
 *  @property string $delimeter
 *  @return string
 *  @method join()
 *  @desctiption converts array into string
 */  
    public static function join(array $array,string $delimiter):string
    {
        return implode($delimiter,$array);
    }
}
