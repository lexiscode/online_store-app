<?php

namespace OnlineStoreApp\Models;
use PDO;

class Product 
{

    public $id;
    
    // variables to create new product
    public $p_name; public $p_price;
    public $p_image; public $p_quantity;
    public $p_category; public $p_description;

    // variables to update products
    public $update_p_name; public $update_p_price; 
    public $update_p_image; public $update_p_category;
    public $update_p_description;


    // Method to update product details and category
    public function updateProduct($conn, $update_id)
    {
        // Check if the selected category exists in the category table
        $category_name = trim($this->update_p_category);

        // Retrieve the category ID based on the selected category name
        $sql_get_category_id = "SELECT id FROM category WHERE LOWER(name) = :category_name";
        $stmt_get_category_id = $conn->prepare($sql_get_category_id);
        $stmt_get_category_id->bindValue(':category_name', strtolower($category_name), PDO::PARAM_STR);
        $stmt_get_category_id->execute();
        $category_id = $stmt_get_category_id->fetchColumn();

        if ($category_id) {

            // Update the product's category_id in the products table
            $sql_update_product = "UPDATE products 
                                SET name = :update_p_name, 
                                    price = :update_p_price,  
                                    image = :update_p_image,
                                    description = :update_p_description,
                                    category_id = :category_id
                                WHERE id = :update_id";

            $stmt_update_product = $conn->prepare($sql_update_product);
            $stmt_update_product->bindValue(':update_id', $update_id, PDO::PARAM_INT);
            $stmt_update_product->bindValue(':update_p_name', $this->update_p_name, PDO::PARAM_STR);
            $stmt_update_product->bindValue(':update_p_price', $this->update_p_price, PDO::PARAM_STR);
            $stmt_update_product->bindValue(':update_p_image', $this->update_p_image, PDO::PARAM_STR);
            $stmt_update_product->bindValue(':update_p_description', $this->update_p_description, PDO::PARAM_STR);
            $stmt_update_product->bindValue(':category_id', $category_id, PDO::PARAM_INT);

            try {
                $result = $stmt_update_product->execute();
                return $result;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                exit;
            }
        } else {
            echo "Error: Selected category does not exist in the category table.";
            exit;
        }
    }



    

    public static function deleteProduct($conn, $id)
    {
        // update the data into the database server
        $sql = "DELETE FROM products 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        // Executes a PDO prepared statement
        $result = $stmt->execute();

        return $result;
    }



    /**
     * Add new products, and also store category data in category table
     */
    public function insertCategoryIfNotExists($conn)
    {
        $sql = "INSERT IGNORE INTO category (id, name) VALUES (:id, :name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $this->p_category, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function newProduct($conn)
    {
        // Insert category if it doesn't exist
        $this->insertCategoryIfNotExists($conn);

        // Insert into "products" table
        $sql_product = "INSERT INTO products (name, price, image, description, category_id) VALUES (:p_name, :p_price, :p_image, :p_description, :category_id)";
        $stmt_product = $conn->prepare($sql_product);
        $stmt_product->bindValue(':p_name', $this->p_name, PDO::PARAM_STR);
        $stmt_product->bindValue(':p_price', $this->p_price, PDO::PARAM_STR);
        $stmt_product->bindValue(':p_image', $this->p_image, PDO::PARAM_STR);
        $stmt_product->bindValue(':p_description', $this->p_description, PDO::PARAM_STR);
        $stmt_product->bindValue(':category_id', $this->p_category, PDO::PARAM_INT);
        
        $result = $stmt_product->execute();

        if ($result) {
            $this->id = $conn->lastInsertId();
            return true;
        }

        return false;
    }


   
    public static function getAllProducts($conn)
    {

        /*
        This query selects the necessary columns from both the "products" and "category" tables and 
        uses aliases (product_name and category_name) for the name columns to distinguish them.
        */
        $sql = "SELECT products.id, products.name AS product_name, products.price, products.image, category.name AS category_name
                FROM products
                JOIN category 
                ON products.category_id = category.id";


        // Execute the sql statement, returning a result set as a PDOStatement object
        $results = $conn->query($sql); 

        return $results;
    }


    public static function getProductsByCategory($conn, $category_id)
    {
        $sql = "SELECT products.id, products.name AS product_name, products.price, products.image, category.name AS category_name
                FROM products
                JOIN category 
                ON products.category_id = category.id
                WHERE products.category_id = :category_id";

        /*
        If you want to retrieve products based on category name instead of category ID, you can modify 
        the WHERE clause as follows: 
        WHERE category.name = :category_name 
        which would then mean that i will change the above argument and also use a string value, e.g. "Foods"
        */
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getProductsByCategoryLimit($conn, $category_id)
    {
        $sql = "SELECT products.id, products.name AS product_name, products.price, products.image, category.name AS category_name
                FROM products
                JOIN category 
                ON products.category_id = category.id
                WHERE products.category_id = :category_id
                LIMIT 3";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    /**
     * Search all products
     */
    public function searchProducts($conn, $searchQuery)
    {
        
        // Query the database for products that match the search query
        $sql = "SELECT * 
                FROM products 
                WHERE name LIKE :search_query";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search_query', "%$searchQuery%", PDO::PARAM_STR);
        $stmt->execute();

        // Return the search results as an array of product objects
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

