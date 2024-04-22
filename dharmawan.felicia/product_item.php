<?php

include_once "lib/php/functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id` =" .$_GET['id'])[0];

$images = explode (",", $product->images);

$image_elements= array_reduce ($images, function($r, $o) {
    return $r."<img src='$o' class='thumb-image'>"; // Add a class for easier selection
});



// print_p($product);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Item</title>

   <?php include "parts/meta.php"; ?>

  <script src="js/product_thumbs.js"></script>

</head>
<body>

   <?php include "parts/navbar.php"; ?>

   <div class="container">
        <div class="product-display">
            <!-- Product Gallery with Main image and Thumbnails -->
            <div class="product-gallery">
                <div class="card soft">
                <div class="main-image-container">
                    <img src="<?=$product->thumbnail?>" alt="Main Product" class="main-image"/>
                </div>
                <div class="thumbnails">
                    <?= $image_elements ?>
                </div>
            </div>
        </div>

            <!-- Product Info -->
            <div class="product-info">
                <h2 class="product-name"><?=$product->name?></h2>
                <div class="product-price">$<?=$product->price?></div>

                <div class="product-title">Description</div>
                <div class="product-description"><?=$product->description?></div>
                <div class="product-title">Dimension</div>
                <div class="product-description"><?=$product->dimension?></div>
                <div class="product-title">Composition</div>
                <div class="product-description"><?=$product->composition?></div>

                <div class="quantity-selector">
                <button class="minus">-</button>
                <input type="number" id="quantity" value="1" min="1">
                <button class="plus">+</button></div>

                <a class="add-to-bag button" href="product_add_to_cart.php?id=<?= $product->id ?>">Add to bag</a>



            </div>
        </div>
    </div>


                

    





</body>
</html>