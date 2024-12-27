<?php
require_once __DIR__ . '/db.php';
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
    $connecter->insert_user($username,$hash_password);
    if(!empty($e)){
        $message = "Sign up successfully, Please login ";
    }
}