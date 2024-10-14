
<?php
include('Database.php');
    $sql = "SELECT name, quantity, price FROM product where id=$_GET[id]";
    $stmt=connection($sql);
    execute($stmt);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        echo '<h2>Update Product</h2>';
        echo '<form action="/E-Commerce/Object.php" method="post">';
        echo 'ProductId: <input type="text" name="id" value='.htmlspecialchars($_GET['id']).'> <br>';
        echo 'ProductName: <input type="text" name="name"><br>';
        echo 'Quantity: <input type="text" name="quantity"><br>';
        echo 'Price:<input type="text" name="price"><br>';
        echo '<input type="submit">';
        echo '</form>';
    } else {
        echo "No products found in the database.";
    }
