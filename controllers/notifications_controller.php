<?php
session_start();

require_once __DIR__ . '/../db.php';

class NotificationsController
{
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  public function index()
  {
    if (!isset($_SESSION['ID'])) {
      header('location: /login.php');
      return;
    }
    $user_id = $_SESSION['ID'];
    $sql = "SELECT
    n.*,
    c.*,
    i.name as institute_name,
    u.username
    FROM notifications n
    LEFT JOIN comments c ON c.id = n.comment_id
    LEFT JOIN users u ON u.id = c.user_id
    LEFT JOIN institutions i ON i.id = c.institute_id
    WHERE n.user_id = ?
    ORDER BY n.id DESC";
    $notifications = $this->db->execute($sql, [$user_id]);
    require_once __DIR__ . '/../views/notifications.php';
  }
}
