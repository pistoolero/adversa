<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6e791b72d0860c04dc0107a875f1db8a
{
    public static $files = array (
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'waylaidwanderer\\SteamCommunity\\' => 31,
        ),
        'p' => 
        array (
            'phpseclib\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'waylaidwanderer\\SteamCommunity\\' => 
        array (
            0 => __DIR__ . '/..' . '/waylaidwanderer/php-steamcommunity',
        ),
        'phpseclib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6e791b72d0860c04dc0107a875f1db8a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6e791b72d0860c04dc0107a875f1db8a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
