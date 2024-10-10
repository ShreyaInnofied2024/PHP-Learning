<?php
$server_name = "localhost";
$user_name = "root";
$password = "password";

$product_id = $_POST["productId"];
$product_name = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

try {
    $conn = new PDO("mysql:host=$server_name;dbname=Products", $user_name, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Product (ProductId, ProductName, Quantity, Price)
            VALUES (:ProductId, :ProductName, :Quantity, :Price)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $product_id);
    $stmt->bindParam(':ProductName', $product_name);
    $stmt->bindParam(':Quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':Price', $price);
    $stmt->execute();

    echo "New record created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
