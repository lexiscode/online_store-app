
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php include 'includes/navigation.php'; ?>


<h1 class="heading" style="padding-top: 7px">Product Details</h1>

<!-- This prints out the successful added cart message alert -->
<?php if (!empty($added_cart_alert)): ?>

<div style="border-radius:10px; padding: 10px; background-color: #48f542; width: 30%; margin: 0 auto;">
   <h2 style="text-align: center; color: white"><?= $added_cart_alert ?></h2>
</div>

<?php endif; ?>


<div class="main-container">

    <div class="product-container">

        <div class="product-image">
            <img src="./public/assets/uploads/<?= htmlspecialchars($product_data->image); ?>" alt="product image">
        </div>

        <div class="product-info">
            <h1 class="product-name"><?= htmlspecialchars($product_data->product_name); ?></h1>
            <span class="product-price">Price: $<?= htmlspecialchars($product_data->price); ?></span>
            <p class="product-description"><span style="font-weight: bold;">Description:</span> <?= htmlspecialchars($product_data->description); ?></p>
            <p class="product-category"><i><span style="font-weight: bold;">Category:</span> <?= htmlspecialchars($product_data->category_name); ?></i></p>
            <div class="product-rating">
                <span class="star-rating">Rating: </span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>

            <!-- display this below if a user is logged-in -->
            <?php 
            use OnlineStoreApp\Models\Auth;
            if (Auth::isLoggedIn()): ?>

                <form method="POST">
                    <input type="hidden" name="p_name" value="<?= htmlspecialchars($product_data->product_name); ?>">
                    <input type="hidden" name="p_price" value="<?= htmlspecialchars($product_data->price); ?>">
                    <input type="hidden" name="p_image" value="<?= htmlspecialchars($product_data->image); ?>">
                    <input type="submit" class="btn" value="🛒Add To Cart" name="add_to_cart">
                </form>

            <!-- display this below if a user is logged-in -->
            <?php else: ?>
                <a href="signin"><input type="submit" class="btn" value="Login To Add-To-Cart🛒"><a>
            <?php endif; ?>

        </div>

    </div>
</div>





<!-- This line of code is about the product review -->

<!-- display this below if a user is logged-in -->
<?php if (Auth::isLoggedIn()): ?>
    <h2 class="subheading">Leave A Comment</h2>
<?php else: ?>
    <h2 class="subheading">Recent Comments</h2>
<?php endif; ?>

<div class="comment-section">

    <!-- display this below if a user is logged-in -->
    <?php if (Auth::isLoggedIn()): ?>

        <form id="review-form" method="POST">
        <div class="input-group">
            <input type="text" id="name" name="customer_name" placeholder="Enter your name here..." required>
        </div>
        <div class="input-group">
            <input type="text" id="image" name="image_url" placeholder="Place image url address here..." >
            <!-- if i wish to set a default img, I will set a "value" attribute to:
            "https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg"
            -->
        </div>
        <div class="input-group">
            <textarea id="comment" name="comment" rows="2" placeholder="Enter your review about this product here..." required></textarea>
        </div>
        <div class="input-group">
            <input type="text" id="rating" name="rating" min="1" max="5" placeholder="Enter your ratings between 1 - 5" required>
        </div>

        <input type="hidden" name="product_id" value="<?= htmlspecialchars($_GET['id']) ?>">

        <button type="submit" id="submit-review-btn" name="submit_review" >Submit</button>
        </form>

    <?php endif; ?>

    <div class="comments">

        <!-- display this below if a user is logged-in -->
        <?php if (Auth::isLoggedIn()): ?>
            <h3>Recent Comments</h3>
        <?php else: ?>
            <h3 style="text-align: center;">You must be logged in first, in order to make comments.</h3>
        <?php endif; ?>

        <?php if (!empty($review_data)): ?>

            <?php foreach ($review_data as $index => $fetch_review): ?>

                <div class="comment">
                    <div class="comment-image">
                        <img src="<?= htmlspecialchars($fetch_review['image_url']); ?>" alt="User Avatar">
                    </div>
                    <div class="comment-content">
                        <h4><?= htmlspecialchars($fetch_review['customer_name']); ?></h4>
                        <p><?= htmlspecialchars($fetch_review['comment']); ?></p>
                        <div class="rating">
                        <span>Rating ★:</span>
                        <span><?= htmlspecialchars($fetch_review['rating']); ?> / 5</span>
                        </div>
                        <div class="review-date">
                        <span>Review Date:</span>
                        <span><?= htmlspecialchars($fetch_review['review_date']); ?></span>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>   

        <?php else: ?>
            <p style="text-align: center;">No review made yet.</p>
        <?php endif; ?>
      
    </div>
</div>





<!-- display this below if a user is logged-in -->
<?php if (Auth::isLoggedIn()): ?>

    <!-- New main container for related products -->
    <section class="productss">

        <h2 class="subheading">Related Products</h2>

        <div class="box-container">

        <?php if ($product_data->category_name == "Foods"): ?>

            <?php foreach ($A_cat_get_products as $index => $fetch_product): ?>
        
                <div class="box" style="background-color: white; border: none">
                    <img src="./public/assets/uploads/<?= $fetch_product['image']; ?>" alt="meal photo">
                    <h3><?= $fetch_product['product_name']; ?></h3>
                    <div class="price">$<?= $fetch_product['price']; ?>/-</div>

                    <a href="product?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>
                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <?php foreach ($B_cat_get_products as $index => $fetch_product): ?>
        
                <div class="box" style="background-color: white; border: none">
                    <img src="./public/assets/uploads/<?= $fetch_product['image']; ?>" alt="meal photo">
                    <h3><?= $fetch_product['product_name']; ?></h3>
                    <div class="price">$<?= $fetch_product['price']; ?>/-</div>

                    <a href="product?id=<?= $fetch_product['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>View Product</a>
                </div>

            <?php endforeach; ?>

        <?php endif; ?>
        </div>

    </section>

<?php endif; ?>



<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
