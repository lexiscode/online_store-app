<!-- FOOTER -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-logo">

         <a href="/online_store-app" class="logo" style="font-family: Oswald; color: white"><h1>🍔Lexis-Foodies</h1></a>
      
        </div>
      <div class="footer-links">
        <ul>
          <li><a href="/online_store-app">Home</a></li>
          <?php 
          use OnlineStoreApp\Models\Auth;
          
          if (Auth::isLoggedIn()): ?>
          <li><a href="all_product_category">Shop</a></li>
          <?php endif; ?>
          <li><a href="about_us">About Us</a></li>
        </ul>
      </div>
      <div class="footer-social">
        <!-- Add your social media icons here -->
         <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
         <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
        
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="http://localhost/online_store-app/public/js/ajax/delete_product.js"></script>
<script src="http://localhost/online_store-app/public/js/img_dimension.js"></script>
<script src="http://localhost/online_store-app/public/js/script.js"></script>
<script src="http://localhost/online_store-app/public/js/aria_current.js"></script>

</body>
</html>