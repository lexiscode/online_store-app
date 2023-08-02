<?php 

namespace OnlineStoreApp\Models;
use PDO;

/*Interface segregation principle applied here*/
interface makeNewOrder {
    public function newOrder($conn);
}
interface getAllOrders {
    public static function getAllOrders($conn);
}


class Order implements makeNewOrder, getAllOrders
{

    // variables for checkout
    public $name; public $number;
    public $email; public $method;
    public $street; public $city;
    public $state; public $country;
    public $total_products; public $grand_total;


     /**
     * Checkout Page new Order
     */
    public function newOrder($conn)
    {
             
        // Update the data into the database server
        $sql = "INSERT INTO orders (name, number, email, method, street, city, state, country, total_products, total_price)
                VALUES (:name, :number, :email, :method, :street, :city, :state, :country, :total_products, :grand_total)";
 
        // Prepares the statement for execution
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':number', $this->number, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':method', $this->method, PDO::PARAM_STR);
        $stmt->bindValue(':street', $this->street, PDO::PARAM_STR);
        $stmt->bindValue(':city', $this->city, PDO::PARAM_STR);
        $stmt->bindValue(':state', $this->state, PDO::PARAM_STR);
        $stmt->bindValue(':country', $this->country, PDO::PARAM_STR);
        $stmt->bindValue(':total_products', $this->total_products, PDO::PARAM_STR);
        $stmt->bindValue(':grand_total', $this->grand_total, PDO::PARAM_STR);

        // Executes a PDO prepared statement
        $result = $stmt->execute();
 
        if ($result){
            // gets the last id
            $this->id = $conn->lastInsertId();
            return true;
        }
    }


    public static function getAllOrders($conn)
    {

        // READING FROM THE CART DATABASE 
        $sql = "SELECT * 
                FROM orders";

        // Execute the sql statement, returning a result set as a PDOStatement object
        $result = $conn->query($sql); 

        return $result;
    }

}





