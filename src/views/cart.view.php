
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php require 'includes/navigation.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading" style="text-align: center">Shopping Cart</h1>

   <table>

      <thead>
         <th>Image</th>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total Price</th>
         <th>Action</th>
      </thead>

      <tbody>

        <?php
    
        // Check if the query was successful
        if ($select_cart && $select_cart->rowCount() > 0) {
            // Loop through each row of the result set
            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                // Access the row data using the $row_data variable
        ?>

         <tr>
            <td><img src="./public/assets/uploads/<?= htmlentities($fetch_cart['image']); ?>" height="100" alt="meal photo"></td>
            <td><?= htmlentities($fetch_cart['name']); ?></td>
            <td>$<?= number_format($fetch_cart['price'], 2,".", ","); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?= htmlentities($fetch_cart['id']); ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?= htmlentities($fetch_cart['quantity']); ?>" >
                  <input type="submit" value="Update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?= $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart?remove=<?= htmlspecialchars($fetch_cart['id']); ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i>Remove</a></td>
         </tr>

         <?php
           $grand_total += $sub_total;  
            }
         }
         ?>
         <tr class="table-bottom">
            <td><a href="all_product_category" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
            <td colspan="3"><b>Grand Total</b></td>
            <td><b>$<?= $grand_total; ?>/-</b></td>
            <td><a href="cart?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn" style="background-color: #6c757d"> <i class="fas fa-trash"></i>Clear All</a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout" class="btn <?= ($grand_total > 1)? '':'disabled'; ?>">Proceed To Checkout</a>
   </div>

</section>

</div>
   
<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
