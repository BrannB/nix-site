<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit52ee5796dfa1d310fab2c50a2c4d3b22
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'models\\' => 7,
        ),
        'a' => 
        array (
            'app\\tools\\Exceptions\\' => 21,
            'app\\tools\\' => 10,
            'app\\sessions\\' => 13,
            'app\\controllers\\' => 16,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'N' => 
        array (
            'Niksteklo34\\Logger\\' => 19,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'A' => 
        array (
            'Authentication\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'app\\tools\\Exceptions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/tools/Exceptions',
        ),
        'app\\tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/tools',
        ),
        'app\\sessions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/sessions',
        ),
        'app\\controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Niksteklo34\\Logger\\' => 
        array (
            0 => __DIR__ . '/..' . '/niksteklo34/logger/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Authentication\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Authentication',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Router' => __DIR__ . '/../..' . '/app/router/Router.php',
        'app\\DB' => __DIR__ . '/../..' . '/app/DB.php',
        'app\\models\\User' => __DIR__ . '/../..' . '/models/User.php',
        'app\\services\\UserService' => __DIR__ . '/../..' . '/app/services/UserService.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit52ee5796dfa1d310fab2c50a2c4d3b22::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit52ee5796dfa1d310fab2c50a2c4d3b22::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit52ee5796dfa1d310fab2c50a2c4d3b22::$classMap;

        }, null, ClassLoader::class);
    }
}
