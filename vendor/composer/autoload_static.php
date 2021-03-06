<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit09a6bc65a16254ace91794d95ad9c0fc
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit09a6bc65a16254ace91794d95ad9c0fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit09a6bc65a16254ace91794d95ad9c0fc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
