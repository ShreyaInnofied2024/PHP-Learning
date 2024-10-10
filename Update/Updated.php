<?php
$server_name = "localhost";
$user_name = "root";
$password = "password";
$product_id = $_POST["productId"];                  // input form Form
$product_name = $_POST["name"];                     //input from Form
$quantity = $_POST["quantity"];                     //input from Form
$price = $_POST["price"];                           //input from Form
try {
    $conn = new PDO("mysql:host=$server_name;dbname=Products", $user_name, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Product SET ProductName = :ProductName, Quantity = :Quantity, Price = :Price WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $product_id, PDO::PARAM_STR);
    $stmt->bindParam(':ProductName', $product_name, PDO::PARAM_STR);
    $stmt->bindParam(':Quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':Price', $price, PDO::PARAM_STR);
    $stmt->execute();

    echo "Record updated successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
