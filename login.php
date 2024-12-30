<?php

require_once __DIR__ . '/controllers/user_controller.php';

$controller = new UserController();
$controller->login();
