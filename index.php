<?php
require 'bootstrap.php';

// $fire->push("users", array("fname"=>"Monica", "lname" => "Harper", "email"=>"monicawalkswithfaith@yahoo.com", "password"=>"password"));
// $users = $fire->get("users/*/fname=Monica");

// Home Page
$app->action('/', function (&$view) {
    // EXAMPLE variables
    global $app;
    $userInfo = $app->getUserInfo();
    $view = 'index';
    // EXAMPLE selection
    if($userInfo == ''){
      // EXAMPLE array
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
