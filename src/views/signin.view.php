<!--HTML -->
<?php require "partials/header.view.php"; ?>
<?php require "includes/navigation.php"; ?>

<div class="s-container-section">
    <div class="s-card">
        <div class="s-card-header">
            <h5 class="text-white">Login to your Account</h5>
        </div>
        <div class="s-card-body">

            <!-- This prints out the error message(s) of there are any non-filled form in the browser -->
            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-- Display the session alert if it exists -->
            <?php if ($alertMessage): ?>
                <div style="padding: 5px; background-color: #28a745; color: white; text-align: center">
                    <?= $alertMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="s-form-group">
                    <label for="username" class="s-label" style="padding-top: 3px;">Username:</label>
                    <input type="text" class="s-form-control" name="username" id="username" placeholder="Enter your username" >
                </div>
                <div class="form-group">
                    <label for="password" class="s-label">Password:</label>
                    <input type="password" class="s-form-control" name="user_password" id="password" placeholder="Enter your password" >
                </div>
                
                <br>
                <button type="submit" name="signin" class="btn btn-primary btn-register">Sign In</button>
            </form>

        </div>
    </div>
</div>


<?php require "partials/footer.view.php" ?>

