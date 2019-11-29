<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08ad3a2c1aca6a796d5ecde82bb3545b
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PhpOption\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpoption/phpoption/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08ad3a2c1aca6a796d5ecde82bb3545b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08ad3a2c1aca6a796d5ecde82bb3545b::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit08ad3a2c1aca6a796d5ecde82bb3545b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
