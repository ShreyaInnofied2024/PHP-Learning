<?php
class Product{
public $ProductId;
public $ProductName;
public $Quantity;
public $Price;

function __construct($ProductId,$ProductName,$Quantity,$Price){
$this->ProductId=$ProductId;
$this->ProductName=$ProductName;
$this->Quantity=$Quantity;
$this->Price=$Price;
}

function AddProduct($ProductId,$ProductName,$Quantity,$Price){
$servername = "localhost";
$username = "root";
$password = "password";

$productId = $ProductId;
$productName = $ProductName;
$quantity = $Quantity;
$price = $Price;

try {
    $conn = new PDO("mysql:host=$servername;dbname=Products", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Product (ProductId, ProductName, Quantity, Price)
            VALUES (:productId, :productName, :quantity, :price)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productId', $productId , PDO::PARAM_STR);
    $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT); 
    $stmt->bindParam(':price', $price, PDO::PARAM_INT); 
    $stmt->execute();

    echo "New record created successfully <br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
}

function UpdateProduct($ProductId,$ProductName,$Quantity,$Price){
$ProductId = $ProductId;
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
     $name=$ProductName;
     $quantity=$Quantity;
     $price=$Price;
    $sql1= "UPDATE Product SET ProductName = :ProductName, Quantity = :Quantity, Price = :Price WHERE ProductId = :ProductId";
    $stmt1= $conn->prepare($sql1);
    $stmt1->bindParam(':ProductId', $ProductId, PDO::PARAM_STR);
    $stmt1->bindParam(':ProductName', $name, PDO::PARAM_STR);
    $stmt1->bindParam(':Quantity', $quantity, PDO::PARAM_INT); 
    $stmt1->bindParam(':Price', $price, PDO::PARAM_INT);
    $stmt1->execute();
    echo "Record updated successfully <br>";
    }
    else {
        echo "Product not found.";
    }
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
conn->null;
}

function DeleteProduct($ProductId){
$servername = "localhost";
$username = "root";
$password = "password";
try {
    $conn = new PDO("mysql:host=$servername;dbname=Products", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM Product WHERE ProductId = :ProductId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ProductId', $ProductId, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount()>0){
    echo "Record deleted successfully <br>";
    }else{
    echo "No record found";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
}


function __destruct(){
echo "End of Program";
}
}

$Phone=new Product($_POST['productId'],$_POST['name'],$_POST['quantity'],$_POST['price']);
//$Phone->AddProduct($_POST['productId'],$_POST['name'],$_POST['quantity'],$_POST['price']);
//$Phone->UpdateProduct($_POST['ID'],'Apple',5,90000);
//$Phone->DeleteProduct($_POST['Id']);
