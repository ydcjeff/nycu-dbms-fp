<?php
session_start();

require_once __DIR__ . '/../db.php';

class RankingsController
{
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  // index route
  public function index()
  {
    if (!empty($_POST) && !isset($_SESSION['user_id'])) {
      header('location: /login.php');
      return;
    }
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
      $this->update_comment($_POST['comment_id'], $_POST['comment']);
    } else if (isset($_POST['action']) && $_POST['action'] === 'del') {
      $this->del_comment($_POST['comment_id']);
    } else if (isset($_POST['submit_comment'])) {
      $user_id = $_SESSION['user_id'];
      $institute_id = $_POST['institute_id'];
      $comment = $_POST['comment'];
      $this->add_comment($user_id, $institute_id, $comment);
    }

    // define data that is used in compare.php route
    $uni1_query = (int) (empty($_GET['uni1']) ? 1 : $_GET['uni1']);
    $uni2_query = (int) (empty($_GET['uni2']) ? 2 : $_GET['uni2']);
    $universities = $this->get_all_universities();
    $uni1_ranks = $this->find_by_institute_id($uni1_query);
    $uni2_ranks = $this->find_by_institute_id($uni2_query);
    $comments_uni1 = $this->get_comments($uni1_query);
    $comments_uni2 = $this->get_comments($uni2_query);

    require_once __DIR__ . '/../views/compare.php';
  }

  private function find_by_institute_id(int $id)
  {
    return $this->db->query("SELECT * FROM rankings WHERE institution_id = $id ORDER BY ranked_year DESC");
  }

  private function get_all_universities()
  {
    return $this->db->query("SELECT * FROM institutions ORDER BY id ASC");
  }

  private function get_comments(int $institute_id)
  {
    $sql = "SELECT c.*, u.username FROM comments c LEFT JOIN users u ON u.id = c.user_id WHERE c.institute_id = ?";
    return $this->db->execute($sql, [$institute_id]);
  }

  private function add_comment(int $user_id, int $institute_id, string $comment)
  {
    $sql = "INSERT INTO comments (user_id, institute_id, comment) VALUES (?, ?, ?)";
    $this->db->execute($sql, [$user_id, $institute_id, $comment]);
    $comment_id = $this->db->execute("SELECT LAST_INSERT_ID() as id")[0]['id'];
    $comments = $this->db->execute("SELECT user_id FROM comments WHERE user_id != ? AND institute_id = ?", [$user_id, $institute_id]);
    foreach ($comments as $comment) {
      $this->db->execute("INSERT INTO notifications (user_id, institute_id, comment_id) VALUES (?, ?, ?)", [$comment['user_id'], $institute_id, $comment_id]);
    }
  }

  private function update_comment(int $comment_id, string $comment)
  {
    return $this->db->execute("UPDATE comments SET comment = ? WHERE id = ?", [
      $comment,
      $comment_id,
    ]);
  }

  private function del_comment(int $comment_id)
  {
    $this->db->execute("DELETE FROM comments WHERE id = ?", [$comment_id]);
  }
}
