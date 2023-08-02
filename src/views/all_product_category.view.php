
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>

<div class="container" id="products">

<section class="products">



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

      <form method="POST">
         <div class="box" style="background-color: white; border: none">

            <img src="./public/assets/uploads/<?= $fetch_product['image']; ?>" alt="meal photo">
            <h3><?= $fetch_product['product_name']; ?></h3>
            <div class="price">$<?= $fetch_product['price']; ?>/-</div>

            <a href="product?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>

         </div>
      </form>

      <?php
         }
      }
      ?>
      

   </div>
</section>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>