
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>

<?php require 'includes/navigation.php'; ?>

<div class="container">

<section>

    <form method="POST" class="add-product-form" enctype="multipart/form-data">
        <h3>ADD A NEW PRODUCT</h3>

        <!-- This prints out the error message(s) of there are any non-filled form in the browser -->
        <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li style="color: red"><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- This prints out the successful message alert -->
        <?php if (!empty($added_product_alert)): ?>
            <p style="color: green; text-align: center;"><?= $added_product_alert ?></p>
        <?php endif; ?>

        <input type="text" name="p_name" id="p_name" placeholder="Enter the name of your product" class="box">
        <input type="number" name="p_price" min="0" placeholder="Enter the price of your product" class="box">

        <input type="file" name="file" id="file" accept="image/*" onchange="checkImageResolution(event);" class="box" required>
        <!--always use the name key above as "file" in order to tally with display_upload.php -->
        <p id="error-message" style="color: red"></p>

        <textarea id="p_description" name="p_description" rows="1" class="box" placeholder="Enter the product description here..."></textarea>

        <label for="category">Select a category:</label>
        <select id="category" name="p_category" class="box">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $defaultCategoryId) ? 'selected="selected"' : ''; ?>>
                    <?php echo $category['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="add_product" class="btn">ADD PRODUCT</button>
        <a href="all_product_category"><button type="button" class="btn" style="background-color: #6c757d">VIEW PRODUCTS</button></a>

    </form>

</section>

</div>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
