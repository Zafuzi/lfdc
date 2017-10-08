<?php

namespace Pug;

include_once  './vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Application
{
    protected $route;

    public function __construct($srcPath, $pathInfo)
    {
        $this->route = ltrim($pathInfo, '/');

        spl_autoload_register(function ($class) use ($srcPath) {
            if (
                strstr($class, 'Pug') /* new name */ ||
                strstr($class, 'Jade') /* old name */
            ) {
                include($srcPath . str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php');
            }
        });
    }

    public function action($path, \Closure $callback)
    {
        if (ltrim($path, '/') === $this->route) {
            $pug    = new Pug();
            $vars   = $callback($path) ?: array();
            $output = $pug->render('./views/' . $path . '.pug', $vars);
            echo $output;
        }
    }
}

$app = new Application('./vendor/pug-php/pug/src/', isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($argv, $argv[1]) ? $argv[1] : ''));
