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

// Reading from the database to get all products
$select_products = Product::getAllProducts($conn);


// This deletes the product from the database
if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_query = Product::deleteProduct($conn, $delete_id);

   if($delete_query){

      header('location: modify_products');
      exit;
   }
}


// HTML Views
require "./src/views/modify_products.view.php";


