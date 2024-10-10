<?php
class Database {                                //Class for Database Connection
    private $server_name;
    private $user_name;
    private $password;
    private $db_name;
    private $conn;

    public function __construct($server_name = "localhost", $user_name = "root", $password = "password", $db_name = "Products") {
        $this->server_name = $server_name;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    public function connect() {       //function to connect database
        try {
            $this->conn = new PDO("mysql:host={$this->server_name};dbname={$this->db_name}", $this->user_name, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function disconnect() {    //function to disconnect database
        $this->conn = null; 
    }

    public function get_connection() {     //function to get connection from database
        return $this->conn;
    }
}


class Product
{
    public $product_id;
    public $product_name;
    public $quantity;
    public $price;

    public function __construct($product_id, $product_name, $quantity, $price)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function add_product($product_id, $product_name, $quantity, $price)   //function to add product product to database using Form
    {
        try {
            $db=new Database();
            $db->connect();
            $conn=$db->get_connection();
            if($conn){
            $sql = "INSERT INTO Product (ProductId, ProductName, Quantity, Price)
            VALUES (:productId, :productName, :quantity, :price)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':productId', $product_id, PDO::PARAM_STR);
            $stmt->bindParam(':productName', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
            $stmt->execute();
            echo "New record created successfully <br>";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $db->disconnect();
    }

    public function update_product($product_id, $product_name, $quantity, $price)      //function to update product product to database using Form
    {
        try {
            $db=new Database();
            $db->connect();
            $conn=$db->get_connection(); 
            $sql = "SELECT ProductId, ProductName, Quantity, Price FROM Product WHERE ProductId = :ProductId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ProductId', $product_id);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($product) {
                $name = $product_name;
                $quantity = $quantity;
                $price = $price;
                $sql1 = "UPDATE Product SET ProductName = :ProductName, Quantity = :Quantity, Price = :Price WHERE ProductId = :ProductId";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bindParam(':ProductId', $product_id, PDO::PARAM_STR);
                $stmt1->bindParam(':ProductName', $name, PDO::PARAM_STR);
                $stmt1->bindParam(':Quantity', $quantity, PDO::PARAM_INT);
                $stmt1->bindParam(':Price', $price, PDO::PARAM_INT);
                $stmt1->execute();
                echo "Record updated successfully <br>";
            } else {
                echo "Product not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $db->disconnect();
    }

    public function delete_product($product_id)            //function to delete product product to database using Form
    {
        try {
            $db=new Database();
            $db->connect();
            $conn=$db->get_connection();
            $sql = "DELETE FROM Product WHERE ProductId = :ProductId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ProductId', $product_id, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo "Record deleted successfully <br>";
            } else {
                echo "No record found";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $db->disconnect();
    }


    public function __destruct()
    {
        echo "End of Program";
    }
}

$Phone = new Product($_POST['productId'], $_POST['name'], $_POST['quantity'], $_POST['price']);
//$Phone->add_product($_POST['productId'],$_POST['name'],$_POST['quantity'],$_POST['price']);
//$Phone->update_product($_POST['ID'],'Apple',5,90000);
//$Phone->delete_product($_POST['Id']);
