<?php
$product_id = $_POST['ID'];               //value received from Form
$server_name = "localhost";
$user_name = "root";
$password = "password";
$db_name = "Products";
try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ProductId, ProductName, Quantity, Price FROM Product WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {                                     //if product found create Form to take inputs for other data.
        echo '<h2>Update Product</h2>';
        echo '<form action="Updated.php" method="post">';
        echo 'ProductId: <input type="text" name="productId"<br>';
        echo 'ProductName: <input type="text" name="name"><br>';
        echo 'Quantity: <input type="text" name="quantity"><br>';
        echo 'Price:<input type="text" name="price"><br>';
        echo '<input type="submit">';
        echo '</form>';
    } else {
        echo "Product not found.";                 //if product not found
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
