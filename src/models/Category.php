<?php

namespace OnlineStoreApp\Models;
use PDO;

/**
 * Category
 * 
 * Groupings for articles
 */
class Category
{
    /**
     * Get all the categories
     * @param object $conn Connection to the database
     * @return array An associative array of all the category records
     */

    public static function getAllCategories($conn)
    {
        
        // READING FROM THE DATABASE AND CHECKING FOR ERRORS
        $sql = "SELECT * 
                FROM category
                ORDER BY name";

        // Execute the sql statement, returning a result set as a PDOStatement object
        $results = $conn->query($sql); 

        return $results->fetchAll(PDO::FETCH_ASSOC);
        // prints an associative array

    }

}


