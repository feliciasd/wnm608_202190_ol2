
 <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartCount = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}
?>

 <input type="checkbox" id="menu" class="hidden">

<header class="navbar">
        <div class="container display-flex">
                <div class="nav-crumbs nav-flex flex-none">
                        <a href="index.php" class="logo">DecoSphere</a>
                    </div>

               <div class="flex-stretch"></div>

               <div class="flex-none menu-button">
                <label for="menu">&equiv;</label>
                </div>

               
                
                <nav class="nav nav-pills nav-flex flex-none">
                <ul>
                <li><a href="new_products.php">New</a></li>
                <li><a href="product_list.php">Shop</a></li>
                <li><a href="cart_page.php">Cart (<?= $cartCount ?>)</a></li>

                <li><a href="admin/index.php">Admin</a></li>
            </ul>
        </nav>
    </div>
</header>

