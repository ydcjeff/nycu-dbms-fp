<?php

class RankingsController {
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  public function find_by_institute_id(int $id)
  {
    $results = $this->db->query("SELECT * FROM rankings WHERE institution_id = $id ORDER BY ranked_year DESC");
    return $results;
  }
  
  public function get_all_universities()
  {
    return $this->db->query("SELECT * FROM institutions");
  }
}
