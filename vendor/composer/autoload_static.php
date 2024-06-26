<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d61f4455c9aa8ad6cf2f4abd95c9eea
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d61f4455c9aa8ad6cf2f4abd95c9eea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d61f4455c9aa8ad6cf2f4abd95c9eea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d61f4455c9aa8ad6cf2f4abd95c9eea::$classMap;

        }, null, ClassLoader::class);
    }
}
