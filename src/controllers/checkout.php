<?php


use OnlineStoreApp\Models\Database\DbConnect;
use OnlineStoreApp\Models\Order;
use OnlineStoreApp\Models\Auth;
use OnlineStoreApp\Models\Cart;
use OnlineStoreApp\Models\User;
use OnlineStoreApp\Models\FormValidate;


// Initialize the session.
session_start();

// You must be login to access this page, if not you will be redirected to the login page
Auth::requireLogin();


// defining the variables
$name = ""; $number = "";
$email = ""; $method = "";
$street = ""; $city = ""; 
$state = ""; $country = "";
$total_products = "";
$grand_total = 0;


// Get the database connection instance
$conn = DbConnect::getInstance();
$conn->getConn();


// Reading all the stored data from the cart database
$select_cart = Cart::getAllCart($conn);

$checkout_data = new Order();

if(isset($_POST['order_btn'])){

   // instantiate our variables
   $checkout_data->name = filter_input(INPUT_POST, 'name');
   $checkout_data->number = filter_input(INPUT_POST, 'number');
   $checkout_data->email = filter_input(INPUT_POST, 'email');
   $checkout_data->method = filter_input(INPUT_POST, 'method');
   $checkout_data->street = filter_input(INPUT_POST, 'street');
   $checkout_data->city = filter_input(INPUT_POST, 'city');
   $checkout_data->state = filter_input(INPUT_POST, 'state');
   $checkout_data->country = filter_input(INPUT_POST, 'country');
   
   // retreives all the cart data inside the cart table in the database
   $cart_query = Cart::getAllCart($conn);

   if ($cart_query && $cart_query->rowCount() > 0) {
      // Loop through each row of the result set
      while ($product_item = $cart_query->fetch(PDO::FETCH_ASSOC)) {
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $grand_total += $product_price;
      }
   }

   // notice this lolzz, very tricky code and important (instantiate)
   $checkout_data->grand_total = $grand_total;

   $total_products = implode(', ',$product_name);

   // notice this lolzz, very tricky code and important (instantiate)
   $checkout_data->total_products = $total_products;

   // checking for empty fields, and throwing error if empty 
   $errors = FormValidate::createCheckoutValidate($checkout_data->name, $checkout_data->number, $checkout_data->email, $checkout_data->method, $checkout_data->street, $checkout_data->city, $checkout_data->state, $checkout_data->country);
       
   // the ADD or CREATE functionality 
   if (empty($errors)) {

      // Insert into the orders database table 
      $detail_query = $checkout_data->newOrder($conn);

      if($cart_query && $detail_query){
         echo "
         <div class='order-message-container'>
         <div class='message-container'>
            <h3>Thank you for shopping with us!</h3>
            <div class='order-detail'>
               <span>".$checkout_data->total_products."</span>
               <span class='total'> Total: $".$checkout_data->grand_total."/-  </span>
            </div>
            <div class='customer-details'>
               <p> Your Name: <span>".$checkout_data->name."</span> </p>
               <p> Your Number: <span>".$checkout_data->number."</span> </p>
               <p> Your Email: <span>".$checkout_data->email."</span> </p>
               <p> Your Address: <span>".$checkout_data->street.", ".$checkout_data->city.", ".$checkout_data->state.", ".$checkout_data->country."</span> </p>
               <p> Your Payment Mode: <span>".$checkout_data->method."</span> </p>
               <p><b>(Pay when product arrives)</b></p>
            </div>
               <a href='all_orders' class='option-btn'>View Completed Orders</a>
               <a href='all_product_category' class='btn'>Continue shopping</a>
            </div>
         </div>
         ";

         // This deletes all previous carts from the database on successful checkout
         Cart::deleteAllCart($conn);
         
      }
   }

}

// HTML Views
require "./src/views/checkout.view.php";