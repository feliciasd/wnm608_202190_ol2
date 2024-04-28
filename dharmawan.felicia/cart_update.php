<?php

session_start();
include_once "lib/php/functions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productId = $_POST['product_id'];

    switch ($_POST['action']) {
        case 'delete':
            // Remove item from cart
            unset($_SESSION['cart'][$productId]);
            break;

        case 'update':
            // Update item quantity and ensure to preserve existing color if set
            $quantity = $_POST['quantity'];
            if ($quantity > 0) {
                $currentColor = isset($_SESSION['cart'][$productId]['color']) ? $_SESSION['cart'][$productId]['color'] : "default"; // Preset or existing color
                $_SESSION['cart'][$productId] = ['quantity' => $quantity, 'color' => $currentColor];
            } else {
                unset($_SESSION['cart'][$productId]);
            }
            break;

        case 'update-color':
            // Update color and ensure the quantity remains unchanged
            $newColor = $_POST['color'];
            if (isset($_SESSION['cart'][$productId])) {
                $currentQuantity = $_SESSION['cart'][$productId]['quantity']; // Presume there's already a quantity set
                $_SESSION['cart'][$productId] = ['quantity' => $currentQuantity, 'color' => $newColor];
            }
            break;
    }

    header("Location: cart_page.php");
    exit;
}

?>
