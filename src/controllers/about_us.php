<?php


use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\GetData;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// Initialize the session.
session_start();


// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// HTML Views
require "./src/views/about_us.view.php";

