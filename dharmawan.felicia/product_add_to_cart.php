<?php
session_start();

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags($data));
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function updateCart($cart, $productId, $quantity, $color) {
    if (isset($cart[$productId])) {
        // $cart[$productId]['quantity'] += $quantity;
        $cart[$productId]['quantity'] += $quantity;
        $cart[$productId]['color'] = $color;
    } else {
        $cart[$productId] = ['quantity' => $quantity, 'color' => $color];
    }
    return $cart;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'], $_POST['quantity'], $_POST['color'])) {
    $productId = sanitizeInput($_POST['product_id']);
    $quantity = (int) sanitizeInput($_POST['quantity']);
    $color = sanitizeInput($_POST['color']);
    
    $_SESSION['cart'] = updateCart($_SESSION['cart'], $productId, $quantity, $color);
    header("Location: cart_page.php");
    exit;
} else {
    // Handle error or redirect if necessary parameters are missing
    exit('Required parameters not set.');
}
?>
