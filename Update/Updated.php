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
    $sql = "UPDATE Product SET ProductName = :ProductName, Quantity = :Quantity, Price = :Price WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $ProductId, PDO::PARAM_INT);
    $stmt->bindParam(':ProductName', $ProductName, PDO::PARAM_STR);
    $stmt->bindParam(':Quantity', $Quantity, PDO::PARAM_INT);
    $stmt->bindParam(':Price', $Price, PDO::PARAM_STR);
    $stmt->execute();

    echo "Record updated successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
