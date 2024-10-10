<?php
$server_name = "localhost";
$user_name = "root";
$password = "password";
$product_id = $_POST["Id"];
try {
    $conn = new PDO("mysql:host=$server_name;dbname=Products", $user_name, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM Product WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $product_id);
    $stmt->execute();

    echo "Record deleted successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
