<?php


namespace OnlineStoreApp\Models;
use PDO;

/**
 * GetDataById
 * 
 * Like a piece of writing for publication by identifying the id
 */
class GetData
{

    public static function getAddedData($conn, $id)
    {
        $sql = "SELECT products.id, products.name AS product_name, products.price, products.image, products.description, category.id AS category_id, category.name AS category_name
                FROM products
                JOIN category 
                ON products.category_id = category.id
                WHERE products.id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        // Set the default fetch mode for this statement
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $result = $stmt->fetch();

        // Fetch all categories
        $categories = self::getAllCategories($conn);

        $result->categories = $categories;

        return $result;
    }

    // Add a new method to fetch all categories
    public static function getAllCategories($conn)
    {
        $sql = "SELECT id, name 
                FROM category";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}



