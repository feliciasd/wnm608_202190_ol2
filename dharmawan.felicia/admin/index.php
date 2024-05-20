<?php
include "../lib/php/functions.php";

$base_url = "http://feliciasd.com/aau/ixd608/dharmawan.felicia/admin/index.php";

$empty_product = (object)[
    "name"=>"",
    "description"=>"",
    "price"=>"",
    "category"=>"",
    "thumbnail"=>"",
    "images"=>"",
    "quantity"=>""
];

// Check and handle POST requests before any output
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = makeConn();
    if (isset($_GET['action']) && $_GET['action'] == "delete" && isset($_GET['id'])) {
        $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        header("Location: $base_url");
        exit;
    } elseif (isset($_POST['id']) && $_POST['id'] == "new") {
        // Handle new product addition
        $stmt = $conn->prepare("INSERT INTO products (name, price, quantity, category, images) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdiss", $_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['category'], $_POST['images']);
        $stmt->execute();
        $new_id = $conn->insert_id;
        header("Location: $base_url?id=$new_id");
        exit;
    } elseif (isset($_GET['id'])) {
        // Handle existing product update
        $stmt = $conn->prepare("UPDATE products SET name=?, price=?, quantity=?, category=?, images=? WHERE id=?");
        $stmt->bind_param("sdissi", $_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['category'], $_POST['images'], $_GET['id']);
        $stmt->execute();
        header("Location: $base_url?id=" . $_GET['id']);
        exit;
    }
}


// Function Definitions
function productListItem($r, $o) {
    return $r . <<<HTML
    <div class="container">
    <div class="admin-item">
    <div class="product-thumbnail">
        <a href='admin/index.php?id={$o->id}'><img src='{$o->thumbnail}' alt='Product Image'></a>
    </div>
    <div class ="admin-item-detail">
        <a href='admin/index.php?id={$o->id}'>{$o->name}</a>
    </div>
    <div class="admin-edit-button">
        <a href='admin/index.php?id={$o->id}&edit=true'>Edit</a>
        </div>
        <div class="admin-delete-button">
        <a href='admin/index.php?id={$o->id}&action=delete' onclick="return confirm('Are you sure?');">Delete</a>
        </div>
    </div>
    </div>
    </div>
    HTML;
}

function showProductPage($o) {
    global $base_url;
    $delete_action = "$base_url?id={$o->id}&action=delete";
    $save_action = "$base_url?id={$o->id}";

    // Explode the images into an array
    $image_urls = explode(',', $o->images);
    $images_html = '';

    // Loop through each image URL and create an <img> tag
    foreach ($image_urls as $url) {
        $url = trim($url); // Remove any accidental whitespace
        $images_html .= "<img src='{$url}' alt='{$o->name}' style='margin-right: 10px;'>";
    }

    return <<<HTML
    <div class="container">
        <div class="admin-product-item">
            <h1 class="admin-title">{$o->name}</h1>
            <div class="admin-product-images">{$images_html}</div>
            <div class="admin-product-details">
            <p>Price: \${$o->price}</p>
            <p>Quantity: {$o->quantity}</p>
            <p>Category: {$o->category}</p>
        </div>
    </div>
        <form method="post" action="$save_action" class="form-admin-card">
        <div class="form-group">
            <h2>Edit Product</h2>
        </div>
        <div class="form-group">
            <label>Name <input type="text" name="name" value="{$o->name}"></label>
        </div>
        <div class="form-group">
            <label>Price <input type="text" name="price" value="{$o->price}"></label>
        </div>
        <div class="form-group">
            <label>Quantity <input type="number" name="quantity" value="{$o->quantity}"></label>
        </div>
        <div class="form-group">
            <label>Category <input type="text" name="category" value="{$o->category}"></label>
        </div>
        <div class="form-group">
            <label>Images <input type="text" name="images" value="{$o->images}"></label>
        </div>
        <div class="form-group button-group">
            <input type="submit" class="admin-submit lato-bold" value="Save">
            <button type="submit" formaction="$delete_action" class="admin-delete lato-bold" onclick="return confirm('Are you sure?');">Delete</button>
        </div>
        </form>
    </div>
    HTML;
}

function showEmptyProductForm() {
    global $base_url;
    return <<<HTML
    <div class="container">
        <form method="post" action="$base_url" class="form-admin-card">
        <div class="form-group">
            <h2>Add New Product</h2>
            <input type="hidden" name="id" value="new">
        </div>
        <div class="form-group">
            <label>Name <input type="text" name="name"></label>
        </div>
        <div class="form-group">
            <label>Price <input type="text" name="price"></label>
        </div>
        <div class="form-group">
            <label>Quantity <input type="number" name="quantity"></label>
        </div>
        <div class="form-group">
            <label>Category <input type="text" name="category"></label>
        </div>
        <div class="form-group">
            <label>Images <input type="text" name="images"></label>
        </div>
            <input type="submit" class="admin-submit lato-bold" value="Add Product">
        </form>
    </div>
    HTML;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Admin Page</title>
    <?php include "../parts/meta.php"; ?>
</head>
<body>
    <input type="checkbox" id="menu" class="hidden">

    <header class="navbar">
        <div class="container display-flex">
            <div class="flex-none">
                <h1>Product Admin</h1>
            </div>
            <div class="flex-stretch"></div>

            <div class="flex-none menu-button">
                <label for="menu">&equiv;</label>
                </div>
                
            <nav class="nav nav-pills nav-flex flex-none">
                <ul>
                    <li><a href="admin/index.php">Product List</a></li>
                    <li><a href="admin/index.php?id=new">Add New Product</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php
        if (isset($_GET['id']) && $_GET['id'] == "new") {
            echo showEmptyProductForm();
        } else if (isset($_GET['id'])) {
            echo showProductPage(makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=" . $_GET['id'])[0]);
        } else {
            echo "<h2>Product List</h2>";
            $result = makeQuery(makeConn(), "SELECT * FROM `products`");
            echo array_reduce($result, 'productListItem');
        }

        ?>
    </div>
</body>



</html>





