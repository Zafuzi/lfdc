<?php
require 'bootstrap.php';

// $fire->push("users", array("fname"=>"Monica", "lname" => "Harper", "email"=>"monicawalkswithfaith@yahoo.com", "password"=>"password"));
// $users = $fire->get("users/*/fname=Monica");

// Home Page
$app->action('/', function (&$view) {
    global $app;
    $userInfo = $app->getUserInfo();
    $view = 'index';
    // $view = 'index';
    if($userInfo == ''){
      $vars= array(
          'title' => 'Home',
          'userInfo' => $userInfo
      );
      return compact('vars');
    }else{
      header( 'Location: /times' );
    }
});

// Times Page
$app->action('times', function (&$view) {
  global $app;
    $vars= array(
        'title' => 'Times',
        'userInfo' => $app->getUserInfo()
    );
    return compact('vars');
});


// Logout
$app->action('logout', function(){
  global $auth0;
  $auth0->logout();
});
