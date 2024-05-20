<?php
session_start();
include_once "lib/php/functions.php";
include_once "parts/templates.php";

function getProductDetails($productId) {
    if (!$productId) return null;
    $result = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` = $productId");
    if ($result) {
        $product = $result[0];
        $product = (object) $product;
        return [
            'thumbnail' => $product->thumbnail,
            'name' => $product->name,
            'price' => $product->price,
            'colors' => explode(", ", $product->colors)  // Assuming colors are stored as "Red, Blue, Green"
        ];
    } else {
        return null;
    }
}



$subtotal = 0;
$taxRate = 0.085; // 8.5% tax rate
foreach ($_SESSION['cart'] as $productId => $details) {
    $product = getProductDetails($productId);
    if ($product) {
        $subtotal += $product['price'] * $details['quantity'];
    }
}

$taxes = $subtotal * $taxRate;
$total = $subtotal + $taxes;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart Page</title>
    <?php include "parts/meta.php"; ?>
</head>
<body>
<?php include "parts/navbar.php"; ?>

<div class="container">
    <h2 class="subheading">Your Orders</h2>
    <div class="cart-items">
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <?php foreach ($_SESSION['cart'] as $productId => $item): ?>
                <?php $product = getProductDetails($productId); ?>
                <?php if ($product): ?>
                    <div class="cart-item">
                        <img src="<?= $product['thumbnail'] ?>" alt="<?= $product['name'] ?>" class="product-thumbnail">
                        <div>
                            <div class="cart-item-name"><?= $product['name'] ?></div>
                            <div class="cart-item-detail">
                                <span>Price: $<?= $product['price'] ?></span>
                                <span>Quantity:
                                    <form method="post" action="cart_update.php" onchange="this.submit()" style="display: inline;">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="product_id" value="<?= $productId ?>">
                                        <select name="quantity" title="Quantity">
                                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                                <option value="<?= $i ?>" <?= $i == $item['quantity'] ? 'selected' : '' ?>><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </form>
                                </span>
                                <span>Color:
                                    <form method="post" action="cart_update.php" onchange="this.submit()" style="display: inline;">
                                        <input type="hidden" name="action" value="update-color">
                                        <input type="hidden" name="product_id" value="<?= $productId ?>">
                                        <select name="color" title="Color">
                                            <?php foreach ($product['colors'] as $color): ?>
                                                <option value="<?= htmlspecialchars($color) ?>" <?= $color === $item['color'] ? 'selected' : '' ?>><?= htmlspecialchars($color) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </form>
                                </span>
                                <span>Total: $<?= number_format($item['quantity'] * $product['price'], 2) ?></span>
                            </div>
                            <form method="post" action="cart_update.php">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="product_id" value="<?= $productId ?>">
                                <input type="submit" value="Delete" class="delete-button">
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="container">
            <div class="cart-items">
                <h3>Order Summary</h3>
                <p>Subtotal: $<?= number_format($subtotal, 2) ?></p>
                <p>Taxes (8.5%): $<?= number_format($taxes, 2) ?></p>
                <p>Total: $<?= number_format($total, 2) ?></p>
            </div>
        <?php endif; ?>
        <br>
    </div>
    <p><a href="product_checkout.php" class="checkout-button">Checkout</a></p>
</div>
</body>

<?php include "parts/footer.php"; ?>
</html>
