<?php


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

// created object for the class GetData
$searched_data = new Product();

// Check if the search query is submitted
if (isset($_GET['search'])) {
    $searchQuery = htmlspecialchars($_GET['search']);
    $searchQuery = trim(ucfirst($searchQuery));
    $searchedResults = $searched_data->searchProducts($conn, $searchQuery);
}

// HTML Views
require "./src/views/product_search.view.php";