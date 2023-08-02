<?php

namespace OnlineStoreApp\Models;
use PDO;

/*Interface segregation principle applied here*/
interface getReviewById {
    public static function getReviewById($conn, $id);
}
interface makeNewReview {
    public function newReview($conn);
}


class Review implements getReviewById, makeNewReview
{
    public $product_id;
    public $customer_name;
    public $comment;
    public $rating;
    public $image_url;

    public static function getReviewById($conn, $id)
    {
        // Fetch and display product reviews
        $sql = "SELECT * 
                FROM reviews 
                WHERE product_id = :product_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function newReview($conn){

        $insertSql = "INSERT INTO reviews (product_id, customer_name, image_url, comment, rating) 
                    VALUES (:product_id, :customer_name, :image_url, :comment, :rating)";


        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bindParam(':product_id', $this->product_id, PDO::PARAM_INT);
        $insertStmt->bindParam(':customer_name', $this->customer_name, PDO::PARAM_STR);
        $insertStmt->bindParam(':comment', $this->comment, PDO::PARAM_STR);
        $insertStmt->bindParam(':image_url', $this->image_url, PDO::PARAM_STR);
        $insertStmt->bindParam(':rating', $this->rating, PDO::PARAM_STR);

        $insertStmt->execute();
    }
}

