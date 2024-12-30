<?php

require_once __DIR__ . '/controllers/notifications_controller.php';
$controller = new NotificationsController();
$controller->index();
