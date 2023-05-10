<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40585c82113841abd54d75325069e132
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hexiros\\PersonTrait\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hexiros\\PersonTrait\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40585c82113841abd54d75325069e132::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40585c82113841abd54d75325069e132::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit40585c82113841abd54d75325069e132::$classMap;

        }, null, ClassLoader::class);
    }
}