<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2937d6cf4709bcb9f3eb2c69d6846c30
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/framework',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Controllers\\HomeController' => __DIR__ . '/../..' . '/controllers/HomeController.php',
        'Framework\\Http\\Route' => __DIR__ . '/../..' . '/framework/Http/Route.php',
        'Framework\\Http\\Router' => __DIR__ . '/../..' . '/framework/Http/Router.php',
        'Framework\\Http\\View' => __DIR__ . '/../..' . '/framework/Http/View.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2937d6cf4709bcb9f3eb2c69d6846c30::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2937d6cf4709bcb9f3eb2c69d6846c30::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2937d6cf4709bcb9f3eb2c69d6846c30::$classMap;

        }, null, ClassLoader::class);
    }
}
