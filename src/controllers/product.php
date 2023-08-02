<?php

/*
require "./models/DbConnect.php";
require "./models/GetData.php";
require "./models/Review.php";
require "./models/Auth.php";
require "./models/Product.php";

require "./models/Cart.php";
require "./models/User.php";
*/

use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\GetData;
use OnlineStoreApp\Models\Review;
use OnlineStoreApp\Models\Product;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;


// Initialize the session.
session_start();


// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// READING or RETRIEVING from the database to get specific product/review by their ids
if (isset($_GET['id'])){

    // checks if the product's id exits in the database, then returns an associative array, which stores in $article variable
    $product_data = GetData::getAddedData($conn, $_GET['id']); 
    // review's id 
    $review_data = Review::getReviewById($conn, $_GET['id']);

    if (!$product_data){
        // if a non-existing id number is in the link
        die("Invalid ID. No data found");
    }

} else {
    // if no id is in the link
    die("ID not supplied. No data found");
}




// defining the variables
$p_name = "";
$p_price = "";
$p_image = "";
$p_quantity = "";
$added_cart_alert = "";

// created object for the class GetData
$cart_data = new Cart();

// ADD TO CART
if(isset($_POST['add_to_cart'])){

    // the first 3 datas below here are from the html form hidden input tag values, which were retrieved from the
    $cart_data->p_name = filter_input(INPUT_POST, 'p_name');
    $cart_data->p_price = filter_input(INPUT_POST, 'p_price');
    $cart_data->p_image = filter_input(INPUT_POST, 'p_image'); 
    $cart_data->p_quantity = 1; 

    // reading from the cart database to check if a particular product is already present or not
    $select_cart = $cart_data->checkProductInCart($conn);

   if($select_cart->rowCount() > 0){
        // this is true if the product is already present in the cart
        $added_cart_alert = "PRODUCT ({$cart_data->p_name}) ALREADY ADDED TO CART!";
   }else{

        $insert_product = $cart_data->newCart($conn); // add the product to the cart

        if($insert_product){
            $added_cart_alert = "PRODUCT ({$cart_data->p_name}) ADDED TO CART SUCCESSFULLY!";
        }
   }

}




// define variables
$product_id = "";
$customer_name = "";
$comment = "";
$rating = "";
$image_url = "";
$added_comment_alert = "";

$add_review_data = new Review();

// Submit Review
if(isset($_POST['submit_review'])){
    $add_review_data->product_id = filter_input(INPUT_POST, 'product_id');
    $add_review_data->customer_name = filter_input(INPUT_POST, 'customer_name');
    $add_review_data->comment = filter_input(INPUT_POST, 'comment');
    $add_review_data->rating = filter_input(INPUT_POST, 'rating');
    $add_review_data->image_url = filter_input(INPUT_POST, 'image_url');

    // Insert the review into the database
    $result = $add_review_data->newReview($conn);

    if ($result){
        
        // Redirect back to the product page after submission
        header('Location: product.php?id=' . $product_id);
        exit;
      
    }
    
}



// Call the function to get products with a specific category
$category_id = 1; // Replace with the specific category ID you want to retrieve (FOODS)
$A_cat_get_products = Product::getProductsByCategoryLimit($conn, $category_id);
// Shuffle the array of products
shuffle($A_cat_get_products);

$category_id = 3; // Replace with the specific category ID you want to retrieve (DRINKS)
$B_cat_get_products = Product::getProductsByCategoryLimit($conn, $category_id);
// Shuffle the array of products
shuffle($B_cat_get_products);


// HTML Views
require "./src/views/product.view.php";

