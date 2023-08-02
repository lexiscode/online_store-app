<?php

/*
require './models/DbConnect.php';
require "./models/Product.php";
require "./models/Auth.php";

require "./models/Cart.php"; 
require "./models/User.php";
*/
use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Product;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// Initialize the session.
session_start();


// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// Call the function to get products with a specific category
$category_id = 1; // Replace with the specific category ID you want to retrieve (FOODS)
$get_products = Product::getProductsByCategory($conn, $category_id);


// HTML Views
require "./src/views/food_products.view.php";