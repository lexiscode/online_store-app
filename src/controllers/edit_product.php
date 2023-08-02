<?php

/*
require "./models/DbConnect.php";
require "./models/GetData.php";
require "./models/Product.php";
require "./models/FormValidate.php";
require "./models/Auth.php";

require "./models/Cart.php"; 
require "./models/User.php";
*/

use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\GetData;
use OnlineStoreApp\Models\Product;
use OnlineStoreApp\Models\FormValidate;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// Initialize the session.
session_start();

// You must be login to access this page, if not you will be redirected to the login page
Auth::requireLogin();


// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();


// READING or RETRIEVING from the database to get specific product post by their ids
if (isset($_GET['id'])){

    // checks if the product's id exits in the database, then returns an associative array, which stores in $article variable
    $product_data = GetData::getAddedData($conn, $_GET['id']); 

    if (!$product_data){
        // if a non-existing id number is in the link
        die("Invalid ID. No data found");
    }

} else {
    // if no id is in the link
    die("ID not supplied. No data found");
}


$update_product_data = new Product();
$update_product_alert = "";

// UPDATE PRODUCT
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if the save/submit button has been clicked, and check if the fields ain't empty also
    if (isset($_POST['update_product'])){

        require "includes/display_upload.php";

        // $update_id = $_GET['id'];
        $update_product_data->update_p_name = filter_input(INPUT_POST, 'update_p_name');
        $update_product_data->update_p_price = filter_input(INPUT_POST, 'update_p_price');
        $update_product_data->update_p_category = filter_input(INPUT_POST, 'update_p_category');
        $update_product_data->update_p_description = filter_input(INPUT_POST, 'update_p_description');
        $update_product_data->update_p_image = $filename;

        // checking for empty fields, and throwing error if empty 
        $errors = FormValidate::createProductValidate($update_product_data->update_p_name, $update_product_data->update_p_price, $update_product_data->update_p_category, $update_product_data->update_p_description);

        if (empty($errors)){

            // UPDATE PDO query
            $result = $update_product_data->updateProduct($conn, $_GET['id']);

            if ($result){

                // it is more advisable to use absolute paths below than relative path
                header("Location: modify_products");
                exit;
            } 

        }
        
        
    }
}


// HTML Views
require "./src/views/edit_product.view.php";