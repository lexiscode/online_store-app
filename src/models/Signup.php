<?php

namespace OnlineStoreApp\Models;
use PDO;

class Signup
{

    public $full_name;
    public $username;
    public $email;
    public $user_password_hashed;

     
    public function insertNewUserData($conn)
    {
             
        $sql = "INSERT INTO users_record (full_name, username, email, user_password)
                VALUES (:full_name, :username, :email, :user_password)";
 
        $stmt = $conn->prepare($sql);
 
        $stmt->bindValue(':full_name', $this->full_name, PDO::PARAM_STR);
        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':user_password', $this->user_password_hashed, PDO::PARAM_STR);
 
        $result = $stmt->execute();
 
        if ($result){
            // gets the last id
            $this->id = $conn->lastInsertId();
            return true;

        }
 
    }
    
}
