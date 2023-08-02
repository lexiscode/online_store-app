<!--HTML -->
<?php require "partials/header.view.php" ?>
<?php require "includes/navigation.php"; ?>

<div class="container-section mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-white">Create A New Account</h5>
        </div>
        <div class="card-body">

            <!-- This prints out the error message(s) of there are any non-filled form in the browser -->
            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            

            <?php if ($signup_alert == true): ?>
            <p><?= "<div class='alert alert-success'>$signup_alert</div>" ?></p>
            <?php endif; ?>

            
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" name="full_name" id="name" placeholder="Enter your name" >
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username" >
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" >
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="user_password" id="password" placeholder="Enter a password" >
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="Confirm your password" >
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                </div>
                <br>
                <button type="submit" name="signup" class="btn btn-primary btn-register">Register</button>
            </form>

        </div>
    </div>
</div>


<?php require "partials/footer.view.php" ?>