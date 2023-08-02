<?php


use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Product;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;
use OnlineStoreApp\Models\FormValidate;
use OnlineStoreApp\Models\Category;



// Initialize the session.
session_start();

// You must be login to access this page, if not you will be redirected to the login page
Auth::requireLogin();


// defining the variables
$p_name = "";
$p_price = "";
$p_category = "";
$p_image = "";
$p_description = "";
$added_product_alert = "";

// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();

// created objects for the different models
$product_data = new Product();
$validate_form = new FormValidate();

// This gets all categories from the database
$categories = Category::getAllCategories($conn);
$defaultCategoryId = "1"; // i set the default category "food" (with id=1) in the html form 

// CREATE/ADD PRODUCTS TO THE DATABASE
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['add_product'])){

        // this checks and secures the image file which is to be uploaded
        require "includes/display_upload.php";

        // getting fields contents, then checking for possible empty fields
        $product_data->p_name = filter_input(INPUT_POST, 'p_name');
        $product_data->p_price = filter_input(INPUT_POST, 'p_price');
        $product_data->p_category = filter_input(INPUT_POST, 'p_category');
        $product_data->p_description = filter_input(INPUT_POST, 'p_description');
        $product_data->p_image = $filename;

        // checking for empty fields, and throwing error if empty 
        $errors = FormValidate::createProductValidate($product_data->p_name, $product_data->p_price, $product_data->p_category, $product_data->p_description);
       
        // the ADD or CREATE functionality should go through if no errors (non-empty fields) are encountered
        if (empty($errors)) {

            // INSERT new product into the database
            $results = $product_data->newProduct($conn);

            // checking for errors, if none, then redirect the user to the new article page
            if ($results){
                
                $added_product_alert = "A NEW PRODUCT HAS BEEN ADDED!";
            }
        
        }
    }
}

// HTML Views
require "./src/views/add_product.view.php";