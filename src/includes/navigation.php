<?php

use OnlineStoreApp\Models\User;

$userRole = "";

// Retrieve the user ID from the session.
if (isset($_SESSION['current_user_id'])) {

    // the current user id value here is gotten from the signin.php file
    $userId = $_SESSION['current_user_id'];

    // Reading from the users database
    $userDetails = User::getUserDetails($conn, $userId);

    // Now, $userDetails contains the registration details of the logged-in user.
    // You can access specific details like this:
    $userRole = $userDetails['user_role']; // 1 for admin, 2 for general user
    
    // Save the user role in the session for future checks.
    $_SESSION['user_role'] = $userRole;
}


require "views/partials/navigation.view.php";

