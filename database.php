<?php
$server_name = "localhost";
$user_name = "root";
$password = "password";

try {
  $conn = new PDO("mysql:host=$server_name;dbname=Products", $user_name, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
