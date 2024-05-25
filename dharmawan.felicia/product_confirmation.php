<?php
session_start();

// Clear the cart after checkout confirmation
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>

    <?php include "parts/meta.php"; ?>

</head>
<body>

    <?php include "parts/navbar.php"; ?>
           
<div class="container">
    <div class="card soft">
        <h2 class="subheading">Thank you for your purchase</h2>

        <p>What do you got in there?</p>
        <p><a href="product_list.php">Continue Shopping</a></p>
    </div>                  

</body>
</html>