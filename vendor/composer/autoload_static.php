<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3921f6fe1e67b7f8e78f088bfe95b1fb
{
    public static $files = array (
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'A' => 
        array (
            'Auth0\\SDK\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Auth0\\SDK\\' => 
        array (
            0 => __DIR__ . '/..' . '/auth0/auth0-php/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pug\\' => 
            array (
                0 => __DIR__ . '/..' . '/pug-php/pug/src',
            ),
        ),
        'O' => 
        array (
            'OAuth2' => 
            array (
                0 => __DIR__ . '/..' . '/adoy/oauth2/src',
            ),
        ),
        'N' => 
        array (
            'NodejsPhpFallback\\' => 
            array (
                0 => __DIR__ . '/..' . '/nodejs-php-fallback/nodejs-php-fallback/src',
            ),
        ),
        'J' => 
        array (
            'JsPhpize' => 
            array (
                0 => __DIR__ . '/..' . '/js-phpize/js-phpize/src',
            ),
            'Jade\\' => 
            array (
                0 => __DIR__ . '/..' . '/pug-php/pug/src',
            ),
        ),
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Firebase\\Error' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseStub.php',
        'Firebase\\FirebaseInterface' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseInterface.php',
        'Firebase\\FirebaseLib' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseLib.php',
        'Firebase\\FirebaseStub' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseStub.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3921f6fe1e67b7f8e78f088bfe95b1fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3921f6fe1e67b7f8e78f088bfe95b1fb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3921f6fe1e67b7f8e78f088bfe95b1fb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3921f6fe1e67b7f8e78f088bfe95b1fb::$classMap;

        }, null, ClassLoader::class);
    }
}
