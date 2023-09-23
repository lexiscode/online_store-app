
<header class="header">

    <div class="flex">

        <!--Default before implementing docker: href="/online_store-app"-->
        <a href="/" class="logo" style="font-family: Oswald">🍔Lexis-Foodies</a>

        <form action="product_search" method="GET">
            <input type="text" name="search" placeholder="  Search products..." value="<?= $searchQuery ?? ''; ?>" style="border-radius: 10px;">
            <button type="submit" style="cursor: pointer;">🔍</button>
        </form>

        <nav class="navbar">

            <!-- display this below if a user is logged-in -->
            <?php 
            use OnlineStoreApp\Models\Auth;
            use OnlineStoreApp\Models\Cart;
            
            if (Auth::isLoggedIn()): 
            ?>


                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1): ?>
                    <!-- Show the special buttons or features for the admins only -->
                    <a href="add_product">Add Products</a>
                    <a href="modify_products">Modify Products</a>
                <?php endif; ?>

            

                <a href="all_orders">All Orders</a>

                <?php
                
                    $all_data = Cart::getAllCart($conn);
                    // Get the number of rows, rowCount() function is used for PDO query
                    $row_count = $all_data->rowCount();
                ?>

                <a href="cart" class="cart">🛒<span><?= $row_count; ?></span></a>

                <?php 
            
                    //logout mechanism is created here
                    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']))
                    Auth::logout();
                ?>
                <a href="?action=logout">Logout</a>

            <!-- display this below if a user is not logged-in -->
            <?php else: ?>
                
                <a href="signup">Registration</a>
                <a href="signin">Login</a>

            <?php endif; ?>
        </nav>
        
        <div id="menu-btn" class="fas fa-bars"></div>

    </div>

</header>
