<?php


use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Signin;
use OnlineStoreApp\Models\FormValidate;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// initialize the session
session_start();

// check for the session alert
$alertMessage = isset($_SESSION['alert']) ? $_SESSION['alert'] : null;

// Clear the session alert after displaying it
unset($_SESSION['alert']);


// defining the variables
$username = ''; $user_password = ''; 

// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// object of the Signin class
$get_data = new Signin();


// User authentication logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // getting fields contents, then checking for possible empty fields
    $get_data->username = filter_input(INPUT_POST, 'username');
    $get_data->user_password = filter_input(INPUT_POST, 'user_password');

    // Validate the credentials against the database
    // (You should hash and compare the password securely)
    $result = User::validateUserCredentials($conn, $get_data->username, $get_data->user_password);

    if ($result) {

        // Validate user credentials and fetch user ID from the database
        $user = User::getUserIdByUsername($conn, $get_data->username);

        if ($user) {

            // If the user exists, set the user ID in the session
            $_SESSION["current_user_id"] = $user["id"];

            Auth::login();

            // Redirect to the desired page
            header("Location: /online_store-app");
            exit;

        }
    }
}

// HTML Views
require "./src/views/signin.view.php";