<?php

if(!isset($_SESSION['email'])){
  header('Location: ..\index.php') ;
  die();
}
require_once __DIR__ . '/controllers/user_controller.php';
require_once  './views/edit_password.php';

if(isset($_POST['password'] ) && isset($_POST['new_password'] ) && isset($_SESSION['email']) ){
  $connecter = new UserController();
  $username = $_SESSION['email'];
  $password = $_POST['password'];
  $new_password = $_POST['new_password'];
  $algo = 'sha256';
  $hash_password = hash(
    $algo,
    $password,
    $binary = false
  );
  $result = $connecter->check_login($username,$hash_password);
  if($result){
    $hash_new_password = hash(
      $algo,
      $new_password,
      $binary = false
    );
    $message = $connecter->update_user($username,$hash_password,$hash_new_password);
    display_message($message);
  }else{
    $message = "password incorrect, please try again";
    display_message($message);
  }
}


