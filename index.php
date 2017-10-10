<?php
require 'bootstrap.php';

// $fire->push("users", array("fname"=>"Monica", "lname" => "Harper", "email"=>"monicawalkswithfaith@yahoo.com", "password"=>"password"));
// $users = $fire->get("users/*/fname=");
// foreach($user in $users)
// printf($username);

/**
 * Home pages list
 */

$app->action('/', function (&$view) {
    global $app;
    $view  = 'index';
    $vars= array(
        'title' => 'Home',
        'userInfo' => $app->getUserInfo(),
        'links' => array(
          array('route' => 'login', 'name' => 'The Login page example'),
          array('route' => 'cities', 'name' => 'The City API search example')
        )
    );
    return compact('vars');
});

/**
 * Basic user form
 */
$app->action('login', function () {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $message['error']   = !!$_POST;
    $message['success'] = false;

    if (trim($username) && trim($password)) {
        $message['error']   = false;
        $message['success'] = true;
    }

    return array(
        'message' => $message,
        'user'    => compact('username', 'password', 'invalid')
    );
});

$app->action('logout', function(){
  global $auth0;
  $auth0->logout();
});
