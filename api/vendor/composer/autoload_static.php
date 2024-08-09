<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63b4d507db36eb99972707b12ebb178e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AditNanda\\UnofficialBriva\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AditNanda\\UnofficialBriva\\' => 
        array (
            0 => __DIR__ . '/..' . '/aditnanda/unofficialbriva/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63b4d507db36eb99972707b12ebb178e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63b4d507db36eb99972707b12ebb178e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit63b4d507db36eb99972707b12ebb178e::$classMap;

        }, null, ClassLoader::class);
    }
}
