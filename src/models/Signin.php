<?php

namespace OnlineStoreApp\Models;
use PDO;

class Signin
{

    public static function getLoginUserData($conn){

        $sql = "SELECT username, user_password FROM users_record";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetch(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}


