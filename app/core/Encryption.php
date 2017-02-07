<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-12-15
 * Time: 21:26
 */
class Encryption
{
    public $string;

    public function encrypt(string $string) : string
    {
        $this->string = $string;
        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );
        $encrypt = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', SHAKey, true),
                $this->string,
                MCRYPT_MODE_CBC,
                $iv
            )
        );

        return $encrypt;
    }
    public function decrypt(string $string) : string
    {
        $this->string = $string;
        $data = base64_decode($this->string);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $decrypted = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', SHAKey, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );
        return $decrypted;
    }
}