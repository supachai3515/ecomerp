<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit351e09d79d96ebc89ac37e3921b3e5e6
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'When\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'When\\' => 
        array (
            0 => __DIR__ . '/..' . '/tplaner/when/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit351e09d79d96ebc89ac37e3921b3e5e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit351e09d79d96ebc89ac37e3921b3e5e6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
