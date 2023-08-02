<?php

require "vendor/autoload.php";


// Define the route mings
$routes = [
    "/" => "src/controllers/index.php",
    "/about_us" => "src/controllers/about_us.php",
    "/add_product" => "src/controllers/add_product.php",
    "/all_orders" => "src/controllers/all_orders.php",
    "/all_product_category" => "src/controllers/all_product_category.php",
    "/cart" => "src/controllers/cart.php",
    "/checkout" => "src/controllers/checkout.php",
    "/delete_product" => "src/controllers/delete_product.php",
    "/drink_products" => "src/controllers/drink_products.php",
    "/edit_product" => "src/controllers/edit_product.php",
    "/food_products" => "src/controllers/food_products.php",
    "/modify_products" => "src/controllers/modify_products.php",
    "/product_search" => "src/controllers/product_search.php",
    "/product" => "src/controllers/product.php",
    "/signin" => "src/controllers/signin.php",
    "/signup" => "src/controllers/signup.php"
];


// Get the current URL path without query parameters
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$request_path = strtok($request_uri, '?');
$path = '/' . trim(str_replace($base_path, '', $request_path), '/');


// Check if the path exists in the routes array
if (isset($routes[$path])) {

    // Include the file that modifies the include path
    require __DIR__ . '/modify_include_path.php';

    // If the path exists, include the corresponding controller file
    include $routes[$path];

} else {
    // If the path is not found in the routes array, handle a 404 error
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit();
}

