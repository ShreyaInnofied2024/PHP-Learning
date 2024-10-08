<?php
$servername = "localhost";
$username = "root";
$password = "password";

$ProductId = $_POST["productId"];
$ProductName = $_POST["name"];
$Quantity = $_POST["quantity"];
$Price = $_POST["price"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=Products", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Product (ProductId, ProductName, Quantity, Price)
            VALUES (:ProductId, :ProductName, :Quantity, :Price)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $ProductId);
    $stmt->bindParam(':ProductName', $ProductName);
    $stmt->bindParam(':Quantity', $Quantity, PDO::PARAM_INT);
    $stmt->bindParam(':Price', $Price);
    $stmt->execute();

    echo "New record created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
