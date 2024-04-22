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
        <h2 class="subheading">Product List</h2>

        

        <?php

        include_once "lib/php/functions.php";
        include_once "parts/templates.php";

        $result = makeQuery(
            makeConn(),
            "
            SELECT *
            -- SELECT `id`, `name`, `price`
            FROM `products`
            ORDER BY `price` DESC
            LIMIT 12
            "
        );

        echo "<div class='grid gap'>",array_reduce($result,'productListTemplate'),"</div>";


        ?>


    </div>
    </div>                  

</body>
</html>