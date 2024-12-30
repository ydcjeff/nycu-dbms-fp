<?php

require_once __DIR__ . '/../db.php';

class CommentController {
    private $db;
    public function __construct()
    {
     $this->db = new DB();
    }
    public function add_comment($user_id, $institute_id, $comment) {
        $sql = "INSERT INTO comments (user_id, institute_id, comment) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$user_id, $institute_id, $comment]);
    }

    // Function to get comments for a specific university (institute)
    public function get_comments($institute_id) {
        $sql = "SELECT * FROM comments WHERE institute_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$institute_id]);
        return $stmt->fetchAll();
    }
}
?>