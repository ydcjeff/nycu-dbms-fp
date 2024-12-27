<?php
require_once __DIR__ . '/controllers/rankings_controller.php';

$rc = new RankingsController();
$rc->index();
