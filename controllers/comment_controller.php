<?php

require_once __DIR__ . '/../db.php';

class CommentController
{
  private $db;
  public function __construct()
  {
    $this->db = new DB();
  }

  public function add_comment($user_id, $institute_id, $comment)
  {
    $sql = "INSERT INTO comments (user_id, institute_id, comment) VALUES (?, ?, ?)";
    $stmt = $this->db->prepare($sql);
    if ($stmt->execute([$user_id, $institute_id, $comment])) {
      $comment_id = $this->db->execute("SELECT LAST_INSERT_ID() as id")[0]['id'];
      $comments = $this->db->execute("SELECT user_id FROM comments WHERE user_id != ? AND institute_id = ?", [$user_id, $institute_id]);
      foreach ($comments as $comment) {
        $this->db->execute("INSERT INTO notifications (user_id, institute_id, comment_id) VALUES (?, ?, ?)", [$comment['user_id'], $institute_id, $comment_id]);
      }
      return true;
    }
    else {
      return false;
    }
  }

  // Function to get comments for a specific university (institute)
  public function get_comments($institute_id)
  {
    $sql = "SELECT c.*, u.username FROM comments c LEFT JOIN users u ON u.id = c.user_id WHERE c.institute_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$institute_id]);
    return $stmt->fetchAll();
  }
}
