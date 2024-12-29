<?php

require_once __DIR__ . '/controllers/user_controller.php';

require_once __DIR__ . '/views/login_view.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $connecter = new UserController();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $algo = 'sha256';
  $hash_password = hash(
    $algo,
    $password,
    $binary = false
  );
  $result = $connecter->check_login($username, $hash_password);
  if($result){
    session_start();
    $_SESSION['email'] = $result;
    header('Location: /');
  }else{
    display_message("Input Error");
  }
}
