<?php

namespace Pug;

include_once  './vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './dotenv-loader.php';

use Auth0\SDK\Auth0;

$domain        = getenv('AUTH0_DOMAIN');
$client_id     = getenv('AUTH0_CLIENT_ID');
$client_secret = getenv('AUTH0_CLIENT_SECRET');
$redirect_uri  = getenv('AUTH0_CALLBACK_URL');

$auth0 = new Auth0([
  'domain' => $domain,
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'redirect_uri' => $redirect_uri,
  'audience' => 'https://' . $domain . '/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);

const DEFAULT_URL = 'https://lfdc-stor.firebaseio.com';
const DEFAULT_TOKEN = 'nbusTv2dtSVi9qnU2WRcOgoAlhGH0yJsvlwsKP8U';
const DEFAULT_PATH = '/';

// Setup main application
class Application{
    protected $route;
    public function __construct($srcPath, $pathInfo, $auth0){
        $this->route = ltrim($pathInfo, '/');
        $this->auth0 = $auth0;
        spl_autoload_register(function ($class) use ($srcPath) {
            if (
                strstr($class, 'Pug') /* new name */ ||
                strstr($class, 'Jade') /* old name */
            ) {
                include($srcPath . str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php');
            }
        });
    }
    public function action($path, \Closure $callback){
        if (ltrim($path, '/') === $this->route) {
            $pug    = new Pug();
            $vars   = $callback($path) ?: array();
            $output = $pug->render('./views/' . $path . '.pug', $vars);
            echo $output;
        }
    }

    public function getUserInfo(){
      return $this->auth0->getUser();
    }
}
$app = new Application('./vendor/pug-php/pug/src/',
                        isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($argv, $argv[1]) ? $argv[1] : ''), $auth0);

// Setup FireBase
class FireBase{
  public function __construct(){
    $this->firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
  }
  public function set($path, $value) {
    $this->firebase->set(DEFAULT_PATH . '/' . $path, $value);
  }
  public function get($path){
    return $this->firebase->get($path);
  }
  public function push($path, $value){
      $this->firebase->push(DEFAULT_PATH . '/' . $path, $value);
  }
}

$fire = new Firebase();
