<?php
$server_name = "localhost";
$user_name = "root";
$password = "password";
$db_name = "Products";

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);    //Database Connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ProductId, ProductName, Quantity, Price FROM Product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    // if result is present
    if (count($result) > 0) {
        echo "<table>";                    //Present the output in the form of a table
        echo "<tr><th>ProductId</th><th>ProductName</th><th>Quantity</th><th>Price</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['ProductId']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found in the database.";       // if result not found
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
