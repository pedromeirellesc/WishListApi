<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3bb7af57767e50350ebb54d7096308bf
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3bb7af57767e50350ebb54d7096308bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3bb7af57767e50350ebb54d7096308bf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3bb7af57767e50350ebb54d7096308bf::$classMap;

        }, null, ClassLoader::class);
    }
}
