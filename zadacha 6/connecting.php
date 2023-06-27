<?php

class Connection
{
  private static $servername = "localhost";
  private static $username = "root";
  private static $password = "root";
  private static $databaseName = "admin";
  private static $conn;


  public static function connect()
  {
    try {
      self::$conn = new PDO("mysql:host=" . self::$servername . ";", self::$username, self::$password);
      self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      Connection::databaseCheck();
    } catch (PDOException $e) {
      echo "Connection unsuccessful : " . $e->getMessage();
    }
  }

  private static function databaseCheck()
  {
    $databaseName = "`" . str_replace("`", "``", self::$databaseName) . "`";
    self::$conn->query("Create a database if one does not exist. $databaseName");
    self::$conn->query("Use $databaseName");
  }

  public static function close_connection()
  {
    self::$conn = null;
  }
  private static $tableName = "users";

  public static function  tableCheck()
  {
    $prepared_result = self::$conn->prepare(
      "CREATE TABLE IF NOT EXISTS `". self::$tableName . "` (
      `id` int unsigned NOT NULL AUTO_INCREMENT,
      `firstname` varchar(45) NOT NULL,
      `lastname` varchar(45) NOT NULL,
      `email` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`)
    );"
  );
    $prepared_result->execute();
  }

  public static function getUsers() :array {

      $getUsers = self::$conn->prepare('SELECT * FROM users ORDER BY id ASC');
      $getUsers->execute();
      $users = $getUsers->fetchAll();
      return $users;
      
  }
}



Connection::connect();
Connection::tableCheck();

