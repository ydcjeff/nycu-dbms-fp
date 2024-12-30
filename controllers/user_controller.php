<?php
require_once __DIR__ . '/../db.php';

class UserController
{
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  public function insert_user(string $username, string $hash_password)
  {
    $sql = "INSERT INTO users (username, hash_password) VALUES (:username, :hash_password)";
    $sth = $this->db->prepare(query: $sql);
    $sth->bindParam(":username", $username);
    $sth->bindParam(":hash_password", $hash_password);
    try {
      $sth->execute();
      return "Sign up successfully, Please login";
    } catch (PDOException $e) {
      if ($e->getCode() == 23000) {
        return "someone has already use this user name!!";
      } else if ($e->getCode() == 0) {
        return $e->getMessage();
      }
    }
  }

  public function check_login(string $username, string $password)
  {
    $sql = "SELECT username FROM users WHERE username = :username AND hash_password = :hash_password";
    $sth = $this->db->prepare($sql);
    $sth->bindParam(":username", $username);
    $sth->bindParam(":hash_password", $password);
    $sth->execute();
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    return $sth->fetchColumn();
  }

  public function update_user(string $username, string $password, string $new_password)
  {
    $sql = "UPDATE users SET hash_password = :new_hash_password WHERE username = :username AND hash_password = :hash_password";
    $sth = $this->db->prepare($sql);
    $sth->bindParam(":username", $username);
    $sth->bindParam(":new_hash_password", $new_password);
    $sth->bindParam(":hash_password", $password);
    try {
      $sth->execute();
      return "Update successfully";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
