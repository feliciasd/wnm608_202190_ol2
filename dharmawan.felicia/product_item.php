
<?php

session_start();

include_once "lib/php/functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id` =" .$_GET['id'])[0];

// Check if product exists and has colors listed
if($product && !empty($product->colors)) {
    // Split the colors string into an array
    $color_options = explode(", ", $product->colors);
} else {
    // Handle case where product or colors are not found
    $color_options = [];
}


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
            <div class="product-gallery">
                <div class="card soft">
                    <div class="main-image-container">
                        <img src="<?=$product->thumbnail?>" alt="Main Product" class="main-image"/>
                    </div>
                    <div class="thumbnails"><?= $image_elements ?></div>
                </div>
            </div>
            <div class="product-info">
                <h2 class="product-name"><?=$product->name?></h2>
                <div class="product-price">$<?=$product->price?></div>
                <div class="product-title">Description</div>
                <div class="product-description"><?=$product->description?></div>

                <form action="product_add_to_cart.php" method="post">
                    <div class="product-title">Color</div>
                    <?php if(!empty($color_options)): ?>
                        <select name="color" id="color-select" class="color-selector">
                            <?php foreach ($color_options as $color): ?>
                                <option value="<?= htmlspecialchars($color) ?>"><?= htmlspecialchars($color) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>

                    <div class="product-title">Dimension</div>
                    <div class="product-description"><?=$product->dimension?></div>
                    <div class="product-title">Composition</div>
                    <div class="product-description"><?=$product->composition?></div>

                    <div class="quantity-selector">
                        <button type="button" class="minus">-</button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1">
                        <button type="button" class="plus">+</button>
                    </div>
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    <input type="submit" class="add-to-bag button" value="Add to bag">
                </form>
            </div>
        </div>
    </div>
</body>

<?php include "parts/footer.php"; ?>

</html>
