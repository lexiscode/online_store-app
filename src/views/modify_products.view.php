
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>

<div class="container">

<section class="display-product-table">
    <h1 class="heading">Product Management</h1>

    <table>

        <thead>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Product Price</th>
            <th>Action</th>
        </thead>

        <tbody>

            <?php

            // Check if the query was successful
            if ($select_products && $select_products->rowCount() > 0) {
                // Loop through each row of the result set
                while ($row_data = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    // Access the row data using the $row_data variable
            ?>

            <tr id="row_<?= $row_data['id']; ?>">
                <td><img src="/online_store-app/public/assets/uploads/<?= $row_data["image"]; ?>" height="100" alt=""></td>
                <td><?= htmlentities($row_data['product_name']); ?></td>
                <td><?= htmlentities($row_data['category_name']); ?></td>
                <td>$<?= htmlentities($row_data['price']); ?>/-</td>
                <td>
                    <a href="modify_products?delete=<?= $row_data['id']; ?>" class="delete-btn" onclick="return confirm('Are your sure you want to delete this?');"><i class="fas fa-trash"></i>Delete</a>
                    <a href="edit_product?id=<?= $row_data['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>Update</a>
                </td>
            </tr>

            <?php
                }   
                }else{
                    echo "<div class='empty'>No product added</div>";
                }
            ?>

        </tbody>
        
    </table>

</section>


<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
