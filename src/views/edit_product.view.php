
<!--HTML Header-->
<?php require "partials/header.view.php"; ?>
<?php include 'includes/navigation.php'; ?>

<div class="container">

<!-- Below is for the update feature -->

<section>

    <form method="POST" class="add-product-form" enctype="multipart/form-data">
        <h3>UPDATE YOUR PRODUCT</h3>

        <!-- This prints out the error message(s) of there are any non-filled form in the browser -->
        <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li style="color: red"><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- This prints out the successful message alert -->
        <?php if (!empty($update_product_alert)): ?>
            <p style="color: green; text-align: center;"><?= $update_product_alert ?></p>
        <?php endif; ?>
        
        <div style="text-align: center">
        <img src="./public/assets/uploads/<?= htmlspecialchars($product_data->image); ?>" height="200" alt="meal photo">
        </div>
        <input type="text" name="update_p_name" id="update_p_name" value="<?= htmlspecialchars($product_data->product_name); ?>" placeholder="Enter the name of your product" class="box">
        <input type="text" name="update_p_price" min="0" value="<?= htmlspecialchars($product_data->price); ?>" placeholder="Enter the price of your product" class="box">
        <input type="file" name="file" id="file" accept="image/*" onchange="checkImageResolution(event);" class="box" required>
        <!--always use the name key above as "file" in order to tally with display_upload.php -->
        <p id="error-message" style="color: red"></p>

        <textarea id="update_p_description" name="update_p_description" rows="2" class="box"><?= htmlspecialchars($product_data->description); ?></textarea>

        <label for="update_p_category">Select A Category:</label>
        <select name="update_p_category" class="box">
            <?php foreach ($product_data->categories as $category) { ?>
                <option value="<?= htmlspecialchars($category['name']); ?>" <?php if ($category['id'] === $product_data->category_id) echo 'selected'; ?>>
                    <?= htmlspecialchars($category['name']); ?>
                </option>
            <?php } ?>
        </select>


        <button type="submit" name="update_product" class="btn">UPDATE PRODUCT</button>
    </form>

</section>

</div>

<!-- FOOTER -->
<?php require "partials/footer.view.php"; ?>
