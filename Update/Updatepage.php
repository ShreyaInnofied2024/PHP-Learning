<?php
$ProductId = $_POST['productId'];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Products";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ProductId, ProductName, Quantity, Price FROM Product WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $ProductId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        echo '<h2>Update Product</h2>';
    echo '<form action="Updated.php" method="post">';
    echo 'ProductId: <input type="text" name="productId"<br>';
      echo 'ProductName: <input type="text" name="name"><br>';
      echo 'Quantity: <input type="text" name="quantity"><br>';
      echo 'Price:<input type="text" name="price"><br>';
      echo '<input type="submit">';
    echo '</form>';
        } else {
        echo "Product not found.";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
conn->null;


