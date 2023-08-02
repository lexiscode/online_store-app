
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>

<!-- Start of Shopping Store Template -->
<div class="welcome-section">
  <div class="container">
    <div class="welcome-content">
      <h1>Welcome to Lexis-Foodies</h1>
      <p>
        Discover a delightful selection of fresh, organic, and locally sourced products.
        From mouthwatering meals to refreshing drinks, we have something for everyone.
        Shop now and experience the taste of perfection.
      </p>

      <!-- display this below if a user is logged-in -->
      <?php 
      use OnlineStoreApp\Models\Auth;

      if (Auth::isLoggedIn()): ?>
      <a href="all_product_category" class="explore-button">Explore Products</a>
      <?php else: ?>
         <a href="signup" class="explore-button">Create A New Account</a>
      <?php endif; ?>

    </div>
  </div>
</div>



<div class="container" id="products">

<section class="products">

    <!-- This prints out the successful added cart message alert -->
    <?php if (!empty($added_cart_alert)): ?>

         <div style="border-radius:10px; padding: 10px; background-color: #48f542">
            <h2 style="text-align: center; color: white"><?= $added_cart_alert ?></h2>
         </div>

    <?php endif; ?>



<!---------------------------- ALL PRODUCT CATEGORIES ---------------------------->

   <h1 class="heading">All Products</h1>

   <div class="box-container">

      <?php

         // Check if the query was successful and the numbers of rows is greater than 0
         if ($select_products && $select_products->rowCount() > 0) {
            // Loop through each row of the result set
            while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            // Access the row data using the $fetch_product variable
      ?>

      
      <div class="box" style="background-color: white; border: none">

         <img src="./public/assets/uploads/<?= $fetch_product['image']; ?>" alt="meal photo">
         <h3><?= $fetch_product['product_name']; ?></h3>
         <div class="price">$<?= $fetch_product['price']; ?>/-</div>

         <a href="product?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>

      </div>
      
      <?php
         }
      }
      ?>
      

   </div>

   <a href="all_product_category" class="show-more">***SHOW MORE***</a>
   
   <hr>
<!---------------------------- FOOD CATEGORY ---------------------------->
   <br><br>
   <h1 class="heading">Food Products</h1>

   <div class="box-container">

      <!-- I chose to use another method here in looping :)) -->
      <?php if (!empty($A_cat_get_products)): ?>

         <?php foreach ($A_cat_get_products as $index => $fetch_product): ?>

            <div class="box" style="background-color: white; border: none">
               <img src="./public/assets/uploads/<?= $fetch_product['image']; ?>" alt="meal photo">
               <h3><?= $fetch_product['product_name']; ?></h3>
               <div class="price">$<?= $fetch_product['price']; ?>/-</div>

               <a href="product?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>

            </div>
            
         <?php endforeach; ?>

      <?php else: ?>
         <p style="text-align: center;">No products found in this category.</p>
      <?php endif; ?>

   </div>

   
   <a href="food_products" class="show-more">***SHOW MORE***</a>
   


   <!---------------------------- DRINKS CATEGORY ---------------------------->
   <br><br>
   <h1 class="heading">Drink Products</h1>

   <div class="box-container">

      <!-- I chose to use another method here in looping :)) -->
      <?php if (!empty($B_cat_get_products)): ?>

         <?php foreach ($B_cat_get_products as $index => $fetch_product): ?>

            <div class="box" style="background-color: white; border: none">

               <img src="./public/assets/uploads/<?= htmlentities($fetch_product['image']); ?>" alt="meal photo">
               <h3><?= htmlentities($fetch_product['product_name']); ?></h3>
               <div class="price">$<?= htmlentities($fetch_product['price']); ?>/-</div>

               <a href="product?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>

            </div>

         <?php endforeach; ?>

      <?php else: ?>
         <h2 style="text-align: center">No products found in this category.</h2>
      <?php endif; ?>

   </div>


   <a href="drink_products" class="show-more">***SHOW MORE***</a>
   

</section>

</div>


<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
