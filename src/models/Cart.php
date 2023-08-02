<?php

namespace OnlineStoreApp\Models;
use PDO;

/*Interface segregation principle applied here*/
interface getAllCart {
    public static function getAllCart($conn);
}
interface checkProductInCart {
    public function checkProductInCart($conn);
}
interface addNewCart {
    public function newCart($conn);
}
interface updateTheCart {
    public function updateCart($conn, $update_c_id);
}
interface deleteACart {
    public static function deleteCart($conn, $id);
}
interface deleteAllCart {
    public static function deleteAllCart($conn);
}


class Cart implements getAllCart, checkProductInCart, addNewCart, updateTheCart, deleteACart, deleteAllCart
{

    // variables to create new product
    public $p_name; public $p_price;
    public $p_image; public $p_quantity;
    public $p_category; public $p_description;

    // variables to update cart quantity
    public $update_c_id; public $update_quantity;



    public static function getAllCart($conn)
    {

        // READING FROM THE CART DATABASE 
        $sql = "SELECT * 
                FROM cart";

        // Execute the sql statement, returning a result set as a PDOStatement object
        $result = $conn->query($sql); 

        return $result;
    }

    public function checkProductInCart($conn)
    {

        // READING FROM THE CART DATABASE 
        $sql = "SELECT * 
                FROM cart
                WHERE name= '{$this->p_name}'";

        // Execute the sql statement, returning a result set as a PDOStatement object
        $result = $conn->query($sql); 

        return $result;
    }


    public function newCart($conn)
    {
             
        // Update the data into the database server
        $sql = "INSERT INTO cart (name, price, image, quantity)
                VALUES (:p_name, :p_price, :p_image, :p_quantity)";
 
        // Prepares the statement for execution
        $stmt = $conn->prepare($sql);
 
        $stmt->bindValue(':p_name', $this->p_name, PDO::PARAM_STR);
        $stmt->bindValue(':p_price', $this->p_price, PDO::PARAM_STR);
        $stmt->bindValue(':p_image', $this->p_image, PDO::PARAM_STR);
        $stmt->bindValue(':p_quantity', $this->p_quantity, PDO::PARAM_STR);
 
        // Executes a PDO prepared statement
        $result = $stmt->execute();
 
        if ($result){
            // gets the last id
            $this->id = $conn->lastInsertId();
            return true;

        }
 
    }


    public function updateCart($conn, $update_c_id)
    {
            
        $sql = "UPDATE cart
                SET quantity = :update_quantity
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->update_c_id, PDO::PARAM_INT);
        $stmt->bindValue(':update_quantity', $this->update_quantity, PDO::PARAM_STR);

        // Executes a PDO prepared statement
        $result = $stmt->execute();

        return $result;
       
    }


    public static function deleteCart($conn, $id)
    {
        // update the data into the database server
        $sql = "DELETE FROM cart 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        // Executes a PDO prepared statement
        $result = $stmt->execute();

        return $result;
    }


    public static function deleteAllCart($conn)
    {
        // update the data into the database server
        $sql = "TRUNCATE TABLE cart";

        $result = $conn->query($sql);

        return $result;
    }
}