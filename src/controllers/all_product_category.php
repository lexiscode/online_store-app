<?php



use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Product;
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


// Get all products from the products table in the database
$select_products = Product::getAllProducts($conn);


// HTML Views
require "./src/views/all_product_category.view.php";