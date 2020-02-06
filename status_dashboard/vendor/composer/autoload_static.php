<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2abba615fce22970525e701d135f2ea
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2abba615fce22970525e701d135f2ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2abba615fce22970525e701d135f2ea::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}