
<header class="header">
    <div class="flex">
        <a href="#" class="logo">PharmaPro</a>
        <nav>
            
        <a href="admin.php" style="visibility: <?php
   if (isset($_SESSION['admin_name'])) {
      echo "visible";
   } else {
      echo "hidden";
   }
?>;">Add Product</a>

            <a href="products.php">View Products</a>
            
        </nav>

        <a href="cart.php" class="cart">cart <span></span> </a>
        <div id="menu-btn" class="fas fa-bars"></div>
    </div> 
</header>