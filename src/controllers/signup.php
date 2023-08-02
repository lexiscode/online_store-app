<?php

/*
require "./models/DbConnect.php";
require "./models/Auth.php";
require "./models/Signup.php";
require "./models/FormValidate.php";

require "./models/Cart.php"; 
require "./models/User.php";
*/

use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Signup;
use OnlineStoreApp\Models\FormValidate;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// starts session
session_start();

// defining the variables
$full_name = ''; $username = ''; $email = ''; 
$user_password = ''; $confirm_password = ''; 
$signup_alert = ''; $user_password_hashed = '';

// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// object of the GetData class
$get_data = new Signup();

// object of the FormValidate class
$validate_form = new FormValidate();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['signup'])){

        // getting fields contents, then checking for possible empty fields
        $get_data->full_name = filter_input(INPUT_POST, 'full_name');
        $get_data->username = filter_input(INPUT_POST, 'username');
        $get_data->email = filter_input(INPUT_POST, 'email');
        $get_data->user_password_hashed = password_hash(filter_input(INPUT_POST, 'user_password'), null);
        $get_data->user_password = filter_input(INPUT_POST, 'user_password');
        $get_data->confirm_password = filter_input(INPUT_POST, 'confirm_password');

        // checking for errors in the form fields, and throwing error it, two ways is shown below:
        // $errors = FormValidate::signup_validate($get_data->full_name, $get_data->username, $get_data->email, $get_data->user_password, $get_data->confirm_password);
        $errors = $validate_form->signupValidate($get_data->full_name, $get_data->username, $get_data->email, $get_data->user_password, $get_data->confirm_password);

        if(empty($errors)){

            // INSERT into the database
            $results = $get_data->insertNewUserData($conn);

            // checking for errors, if none, then redirect the user to the new article page
            if ($results){
                
                // if registration is successful, set the session alert
                $_SESSION['alert'] = "Registration successful! You can now log in.";
            
                header("Location: signin"); 
                exit;
            }
        }     
    }
}


// HTML Views
require "./src/views/signup.view.php";

