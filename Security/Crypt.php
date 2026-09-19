<?php
namespace ElegenceIO\Support\Security;

use Exception;

class Crypt
{

    private static string|null $key = null;
    private static string $cipher = 'AES-256-CBC';

    private static function ValidateKey():bool
    {
        self::$key = $_ENV["app_key"] ?? null;

        if(!self::$key)
        {
            throw new Exception("No Key Found");
        }
        
        return true;
    }
    
    public static function encrypt(string $value):string
    {
            self::ValidateKey();

            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$cipher));
            $encrypted = openssl_encrypt($value, self::$cipher, self::$key, 0, $iv);
            
            // Combine IV and encrypted value for decryption later
            return base64_encode($iv . $encrypted);


    }
    
    public static function decrypt(string $value):bool|string
    {
        self::ValidateKey();

        $decoded = base64_decode($value);
        // Extract IV and encrypted data
        $iv_length = openssl_cipher_iv_length(self::$cipher);
        $iv = substr($decoded, 0, $iv_length);
        $encrypted = substr($decoded, $iv_length);

        return openssl_decrypt($encrypted, self::$cipher, self::$key, 0, $iv);
    }


}