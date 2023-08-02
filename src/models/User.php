<?php

namespace OnlineStoreApp\Models;
use PDO;

class User
{

    public static function getUserDetails($conn, $userId){
        $sql = "SELECT *
                FROM users_record
                WHERE id = :user_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // this fetch only a single row

    }


    

    public static function validateUserCredentials($conn, $username, $password) {

        $sql = "SELECT user_password FROM users_record WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the password hash from the database for the given username
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['user_password'])) {
            // If the username exists and the password matches the hashed password in the database, return true (credentials are valid).
            return true;

        }
     
    }


    public static function getUserIdByUsername($conn, $username) {

        $sql = "SELECT id 
                FROM users_record 
                WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // this fetches a row only

    }

}
