<?php

$env = parse_ini_file('.env');
$DB_USERNAME = $env['DB_USERNAME'];
$DB_PASSWORD = $env['DB_PASSWORD'];
$DB_HOST = $env['DB_HOST'];
$DB_PORT = $env['DB_PORT'];
$DB_NAME = $env['DB_NAME'];

// https://www.php.net/manual/en/pdo.connections.php
try {
  $pdo = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME};port={$DB_PORT}", $DB_USERNAME, $DB_PASSWORD, [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
} catch (\Throwable $th) {
  die("failed to connect to DB.");
}

class DB {
  public function query(string $query)
  {
    try {
      global $pdo;
      $stmt = $pdo->query($query);
      return $stmt->fetchAll();
    } catch (\PDOException $e) {
      die("query failed with" . $e->getMessage());
    }
  }

  public function prepare(string $query)
  {
    try {
      global $pdo;
      $stmt = $pdo->prepare($query);
      return $stmt;
    } catch (\Throwable $th) {
      die("unable to prepare query". $th->getMessage());
    }
  }

  public function execute(string $sql, array $params = null)
  {
    try {
      global $pdo;
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute($params)) {
        return $stmt->fetchAll();
      }
      else {
        die("sql exec failed.");
      }
    } catch (\PDOException $e) {
      die("query failed with" . $e->getMessage());
    }
  }
}
