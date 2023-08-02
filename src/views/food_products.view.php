
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>

<div class="container" id="products">

<section class="products">


<!---------------------------- FOOD CATEGORY ---------------------------->

   <h1 class="heading">Food Products</h1>

   <div class="box-container">

      <!-- I chose to use another method here in looping :)) -->
      <?php if (!empty($get_products)): ?>

         <?php foreach ($get_products as $index => $fetch_product): ?>

            <form method="POST">
               <div class="box" style="background-color: white; border: none">
                  <img src="./public/assets/uploads/<?= $fetch_product['image']; ?>" alt="meal photo">
                  <h3><?= $fetch_product['product_name']; ?></h3>
                  <div class="price">$<?= $fetch_product['price']; ?>/-</div>

                  <a href="product.php?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>

               </div>
            </form>

         <?php endforeach; ?>

      <?php else: ?>
         <p style="text-align: center;">No products found in this category.</p>
      <?php endif; ?>

    </div>

</section>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
