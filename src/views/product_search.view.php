
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>



<div class="container" id="products">

<section class="products">


<!---------------------------- ALL PRODUCT CATEGORIES ---------------------------->

   <h1 class="heading">Searched Results</h1>

   <div class="box-container">

   <?php if (!empty($searchedResults)): ?>

        <?php foreach ($searchedResults as $index => $fetch_product): ?>

            <form method="POST">
                <div class="box" style="background-color: white; border: none">

                <img src="./public/assets/uploads/<?= htmlspecialchars($fetch_product['image']); ?>" alt="meal photo">
                <h3><?= htmlspecialchars($fetch_product['name']); ?></h3>
                <div class="price">$<?= htmlspecialchars($fetch_product['price']); ?>/-</div>

                <a href="product?id=<?= htmlspecialchars($fetch_product['id']); ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>

                </div>
            </form>

        <?php endforeach; ?>   

    <?php else: ?>
        <p style="text-align: center;">Sorry! No related results found.</p>
    <?php endif; ?>

</section>

</div>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>