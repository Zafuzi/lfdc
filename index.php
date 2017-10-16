<?php
require 'bootstrap.php';

// $fire->push("clients/-KwarEGvDFGLuOGkAkuc/times/", array(
//                       "date"=> "10/14/17",
//                       "sign_in"=> "7:01",
//                       "sign_out"=> "14:09"
//                     )
//           );
$clients = json_decode($fire->get("clients/"), true);

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
  global $clients;

  $vars= array(
      'title' => 'Times',
      'userInfo' => $app->getUserInfo(),
      'clients' => $clients
  );
  return compact('vars');
});


// Logout
$app->action('logout', function(){
  global $auth0;
  $auth0->logout();
});
