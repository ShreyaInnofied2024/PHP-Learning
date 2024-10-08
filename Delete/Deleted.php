<?php
$servername = "localhost";
$username = "root";
$password = "password";
$ProductId = $_POST["productId"];
try {
    $conn = new PDO("mysql:host=$servername;dbname=Products", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM Product WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $ProductId);
    $stmt->execute();

    echo "Record deleted successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

