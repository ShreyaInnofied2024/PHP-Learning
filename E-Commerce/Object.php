<?php

include('Database.php');
class Product
{
    public $id;
    public $name;
    public $quantity;
    public $price;

    public function __construct($id, $name, $quantity, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function add()
    {
        $query="INSERT INTO product (id, name, quantity, price) 
        VALUES (:id, :name, :quantity, :price)";
        $stmt=Connection($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_INT);
        execute($stmt);
        echo "New Record Added <br>";
    }

    public function update()
    {
        $query= "UPDATE product SET name = :name, quantity = :quantity, price = :price WHERE id = :id";
        $stmt = Connection($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_INT);
        execute($stmt);
        echo "Record updated successfully <br>";
    }
    

    public function delete()
    {
            $query = "DELETE FROM product WHERE id = :id";
            $stmt = connection($query);
            $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
            execute($stmt);
            if ($stmt->rowCount() > 0) {
                echo "Record deleted successfully <br>";
            } else {
                echo "No record found";
            }
    }


    public function __destruct()
    {
        echo "End of Program";
    }
}

$Phone = new Product($_POST['id'], $_POST['name'], $_POST['quantity'], $_POST['price']);
//$Phone->add();
//$Phone->update();
//$Phone->delete($_POST['id']);
