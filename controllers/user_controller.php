<?php

class usercontroller {
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }


  public function check_if_user_exist(string $username, string $password)
  {
    $sql = "SELECT username FROM users WHERE username = :username AND hash_password = :hash_password";
    $sth = $this->db->prepare($sql);   
    $sth->bindParam(":username",$username);
    $sth->bindParam(":hash_password",$password);
    $sth->execute();
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $result = $sth->fetchColumn();
    return $result; 
  }

  public function insert_user(string $username, string $hash_password)
  {
    $sql = "INSERT INTO users VALUES ( :username , :hash_password )";
    $sth = $this->db->prepare($sql);   
    $sth->bindParam(":username",$username);
    $sth->bindParam(":hash_password",$hash_password);
    $sth->execute();
    
  }
  

}
