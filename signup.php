<?php

require_once __DIR__ . '/controllers/user_controller.php';

require_once './views/signup.php';

if(isset($_POST['username']) && isset($_POST['password'])){
    $connecter = new usercontroller();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $algo = 'sha256';
    $hash_password = hash(
        $algo,
        $password,
        $binary = false
    );
    $message = $connecter->insert_user($username,$hash_password);
    display_message($message);
}