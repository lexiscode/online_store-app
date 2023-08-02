<?php

/*
require "./models/DbConnect.php";
require "./models/Order.php";
require "./models/Auth.php";

require "./models/Cart.php"; 
require "./models/User.php";
*/

use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Order;
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

// Reading from the orders database
$select_orders = Order::getAllOrders($conn);


// HTML Views
require "./src/views/all_orders.view.php";