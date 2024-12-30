<?php
session_start();

require_once __DIR__ . '/../db.php';

class UserController
{
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  public function login()
  {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $algo = 'sha256';
      $hash_password = hash(
        $algo,
        $password,
        false,
      );
      $user = $this->get_user($username, $hash_password);
      if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        header('Location: /');
      } else {
        $error = 'Wrong username or password';
      }
    }
    require_once __DIR__ . '/../views/login_view.php';
  }

  public function signup()
  {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $algo = 'sha256';
      $hash_password = hash(
        $algo,
        $password,
        false,
      );
      $user = $this->get_by_username($username);
      if ($user) {
        $error = 'Username already exists!';
      } else {
        $this->insert_user($username, $hash_password);
        $success = 'Account created successfully.';
      }
    }
    require_once __DIR__ . '/../views/signup.php';
  }

  public function edit_password()
  {
    if (!isset($_SESSION['username'])) {
      header('location: /login.php');
    } else if (isset($_POST['password']) && isset($_POST['new_password']) && isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $password = $_POST['password'];
      $new_password = $_POST['new_password'];
      $algo = 'sha256';
      $hash_password = hash(
        $algo,
        $password,
        false,
      );
      $user = $this->get_user($username, $hash_password);
      if ($user) {
        $hash_new_password = hash(
          $algo,
          $new_password,
          false,
        );
        $this->update_user($username, $hash_password, $hash_new_password);
        $success = "Password updated successfully.";
      } else {
        $error = "Password incorrect, please try again";
      }
    }
    require_once __DIR__ . '/../views/edit_password.php';
  }

  private function insert_user(string $username, string $hash_password)
  {
    $sql = "INSERT INTO users (username, hash_password) VALUES (:username, :hash_password)";
    $this->db->execute($sql, [
      'username' => $username,
      'hash_password' => $hash_password,
    ]);
  }

  private function get_user(string $username, string $password)
  {
    $sql = "SELECT id, username FROM users WHERE username = :username AND hash_password = :hash_password";
    $results = $this->db->execute($sql, [
      'username' => $username,
      'hash_password' => $password,
    ]);
    if (count($results) > 0) {
      return $results[0];
    }
    return null;
  }

  private function get_by_username(string $username)
  {
    $results = $this->db->execute("SELECT id, username FROM users WHERE username = ?", [$username]);
    if (count($results) > 0) {
      return $results[0];
    }
    return null;
  }

  private function update_user(string $username, string $password, string $new_password)
  {
    $sql = "UPDATE users SET hash_password = :new_hash_password WHERE username = :username AND hash_password = :hash_password";
    $this->db->execute($sql, [
      'username' => $username,
      'hash_password' => $password,
      'new_hash_password' => $new_password,
    ]);
  }
}
