
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>

<?php require 'includes/navigation.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">All Completed Orders</h1>

    <div class="box-container">

        <?php

            // Check if the query was successful and the numbers of rows is greater than 0
            if ($select_orders && $select_orders->rowCount() > 0) {
                // Loop through each row of the result set
                while ($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                    // Access the row data using the $fetch_product variable
        ?>

        <div class='box' style="background-color: white; border: none">
            <div class='message-container' style="font-size: 15px;">
                <div class='order-detail'>
                    <p><b><?= $fetch_order['total_products']; ?></b></p>
                    <p class='total'><b>Total: $<?= $fetch_order['total_price']; ?>/-</b></p>
                </div>
                <br>
                <div class='customer-details'>
                    <p>Your Name: <span><?= $fetch_order['name']; ?></span> </p>
                    <p>Your Number: <span><?= $fetch_order['number']; ?></span> </p>
                    <p>Your Email: <span><?= $fetch_order['email']; ?></span> </p>
                    <p>Your Address: <span><?= $fetch_order['street']; ?>, <?= $fetch_order['city']; ?>, <?= $fetch_order['state']; ?>, <?= $fetch_order['country']; ?></span> </p>
                    <p>Your Payment Mode: <span><?= $fetch_order['method']; ?></span> </p>
                </div>
            </div>
        </div>
      
        <?php
                }
            }
        ?>

    </div>

</section>

</div>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
