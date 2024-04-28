
<?php

session_start();
include_once "lib/php/functions.php";

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

// Check if the cart array exists in the session, if not create it
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Adding the product to the cart
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $quantity = $_POST['quantity'] ?? 1; // Default to 1 if not set

    // Initialize the product variable
    $product = null;

    // Find the product in the cart
    foreach ($_SESSION['cart'] as &$item) {
        if ($item->id == $id) {
            $item->quantity += $quantity;
            $product = $item;
            break;
        }
    }
    unset($item); // break the reference with the last element

    // If the product is not found, fetch it from the database
    if (!$product) {
        $result = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` = $id");
        if($result) {
            $product = (object)$result[0]; // Cast to object
            $product->quantity = $quantity;
            $_SESSION['cart'][] = $product;
        }
    }
}

// Redirect to cart page
header('Location: cart_page.php');
exit;

?>



