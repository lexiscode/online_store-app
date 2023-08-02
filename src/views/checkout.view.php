
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">COMPLETE YOUR ORDER</h1>

   <form method="POST">

      <div class="display-order">

         <?php
            // needed to redeclare $grand_total with "0" as value in order to overwrite the previous declared at the top
            $grand_total = 0;

            if ($select_cart && $select_cart->rowCount() > 0) {
               // Loop through each row of the result set
               while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                  $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                  $grand_total += $total_price;
         ?>
         <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
         <?php
            }
         }else{
            echo "<div class='display-order'><span>Your cart is empty!</span></div>";
         }
         ?>
         <span class="grand-total"> Grand Total: $<?= $grand_total; ?>/- </span>
      </div>

      <!--Checkout Form validation Message-->
      <div>
         <!-- This prints out the error message(s) of there are any non-filled form in the browser -->
         <?php if (!empty($errors)) : ?>
                  <ul>
                     <?php foreach ($errors as $error) : ?>
                        <li style="color: red"><?= $error ?></li>
                     <?php endforeach; ?>
                  </ul>
         <?php endif; ?>
      </div>
      <br>

      <div class="flex">

         <div>
            
         </div>
         
         <!--HTML Form-->
         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Enter your name" name="name">
         </div>
         <div class="inputBox">
            <span>Your Number</span>
            <input type="text" placeholder="Enter your number" name="number">
         </div>
         <div class="inputBox">
            <span>Your Email</span>
            <input type="email" placeholder="Enter your email address" name="email">
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Street Address</span>
            <input type="text" placeholder="e.g. street no. and name" name="street">
         </div>
        
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. ikoyi" name="city">
         </div>
         <div class="inputBox">
            <span>State</span>
            <input type="text" placeholder="e.g. lagos" name="state">
         </div>
         <div class="inputBox">
            <span>Country</span>
            <input type="text" placeholder="e.g. nigeria" name="country">
         </div>
        
      </div>

      <input type="submit" value="Order Now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
