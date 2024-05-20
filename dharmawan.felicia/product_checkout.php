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
    <title>Product List</title>

    <?php include "parts/meta.php"; ?>

</head>
<body>

    <?php include "parts/navbar.php"; ?>

<div class="container">
        <div class="checkout-grid">

    <div class="checkout-grid-item order-details">
    <h2 class="subheading">Order Details</h2>
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
                                <span>Total: $<?= number_format($item['quantity'] * $product['price'], 2) ?></span>
                            </div>
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
</div>
</div>

    <div class="checkout-grid-item order-details">
    
    <div class="order-title">Place Your Order</div>
    <h2 class="title">Contact</h2>
    <input type="email" placeholder="Email" />

    <label class="checkbox-container">
        Email me with news and offers
        <input type="checkbox" checked="checked">
        
    </label>
    
    <h2 class="title">Shipping address</h2>
    <div class="input-group">
        <input type="text" placeholder="First name" />
        <input type="text" placeholder="Last name" />
    </div>
    <input type="text" placeholder="Company (required for business addresses)" />
    <input type="text" placeholder="Address" />
    <input type="text" placeholder="Apartment, suite, etc. (optional)" />
    
    <div class="input-group">
        <input type="text" placeholder="City" />
        <select>
            <option>State</option>
            <option>California</option>
        </select>
        <input type="text" placeholder="ZIP code" />
    </div>




<br>


    <div class="payment-card">
        <h3>Payment Information</h3>
        <form class="form-modern" action="" method="post">
            <!-- Cardholder's Name -->
            <div class="form-group">
                <input type="text" id="cardholder-name" placeholder="Cardholder's Name" required />
            </div>
            <!-- Card Number -->
            <div class="form-group">
                <input type="text" id="card-number" placeholder="Card Number" required />
            </div>
            <!-- Expiry Date -->
            <div class="form-group">
                <input type="text" id="expiry-date" placeholder="MM/YY" required />
            </div>
            <!-- CVV -->
            <div class="form-group">
                <input type="text" id="cvv" placeholder="CVV" required />
            </div>
            <!-- Billing Address -->
            <div class="form-group">
                <input type="text" id="billing-address" placeholder="Billing Address" required />
            </div>
            <!-- Submit Button -->
            <div class="form-group">
                <!-- <button type="submit" class="btn-submit">Submit Order</button> -->
                <p><a href="product_confirmation.php" button type="submit" class="checkout-button">Submit Order</a></p>
            </div>
        </form>
    </div>
</div>

</body>

<?php include "parts/footer.php"; ?>

</html>