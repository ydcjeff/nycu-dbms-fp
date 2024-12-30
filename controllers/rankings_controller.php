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
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
      $this->update_comment($_POST['comment_id'], $_POST['comment']);
    }
    else if (isset($_POST['action']) && $_POST['action'] === 'del') {
      $this->del_comment($_POST['comment_id']);
    }

    // define data that is used in compare.php route
    $uni1_query = (int) (empty($_GET['uni1']) ? 1 : $_GET['uni1']);
    $uni2_query = (int) (empty($_GET['uni2']) ? 2 : $_GET['uni2']);
    $universities = $this->get_all_universities();
    $uni1_ranks = $this->find_by_institute_id($uni1_query);
    $uni2_ranks = $this->find_by_institute_id($uni2_query);
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
