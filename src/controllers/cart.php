<?php


use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// Initialize the session.
session_start();

// You must be login to access this page, if not you will be redirected to the login page
Auth::requireLogin();


$update_quantity = "";
$update_c_id = "";

// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// Reading from the database to get all cart items
$select_cart = Cart::getAllCart($conn);

$cart_data = new Cart();

// Update the cart quantity 
if(isset($_POST['update_update_btn'])){
   $cart_data->update_quantity = filter_input(INPUT_POST, 'update_quantity');
   $cart_data->update_c_id = filter_input(INPUT_POST, 'update_quantity_id');

   $update_quantity_query = $cart_data->updateCart($conn, $update_c_id);
   
   if($update_quantity_query){
      header('location: cart');
      exit;
   }
}


// This delete a specific cart data from the database
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   $delete_query = Cart::deleteCart($conn, $remove_id);
   header('location: cart');
   exit;
}


// This deletes all carts data from the database
if(isset($_GET['delete_all'])){
   Cart::deleteAllCart($conn);
   header('location: cart');
   exit;
}

$grand_total = 0;


// HTML Views
require "./src/views/cart.view.php";