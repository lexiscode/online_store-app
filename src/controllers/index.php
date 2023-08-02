<?php


use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Product;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;

// Initialize the session.
session_start();


// General: Error handler function
function myErrorHandler($errno, $errstr){
   echo "<b>Error:</b> [$errno] $errstr";
}
// Set error handler function
set_error_handler("myErrorHandler");


// defining the variables
$p_name = "";
$p_price = "";
$p_image = "";
$p_quantity = "";
$added_cart_alert = "";


// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// created object for the class GetData
$cart_data = new Product();

// Get all products from the products table in the database
$select_products = Product::getAllProducts($conn);


// Call the function to get products with a specific category
$category_id = 1; // Replace with the specific category ID you want to retrieve (FOODS)
$A_cat_get_products = Product::getProductsByCategoryLimit($conn, $category_id);

$category_id = 3; // Replace with the specific category ID you want to retrieve (DRINKS)
$B_cat_get_products = Product::getProductsByCategoryLimit($conn, $category_id);


// HTML Views
require "./src/views/index.view.php";
