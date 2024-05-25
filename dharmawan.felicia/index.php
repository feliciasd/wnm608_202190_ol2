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
        <h2 class="heading">Products like no others.</h2>
    </div>

<div class="container">
    <div class="card soft">
        <h2 class="home-heading"><a href="new_products.php">See Our New Collection</a></h2>
           
<?php

        include_once "lib/php/functions.php";
        include_once "parts/templates.php";

        $result = makeQuery(
            makeConn(),
            "
            SELECT *
            -- SELECT `id`, `name`, `price`
            FROM `products`
            ORDER BY `date_added` DESC
            LIMIT 3
            "
        );

        echo "<div class='grid gap'>",array_reduce($result,'productListTemplate'),"</div>";


        ?>

    </div>
    </div>    

<div class="container">
    <div class="card soft">
        <h2 class="home-heading"><a href="product_list.php">All Products</a></h2>
           
<?php

        include_once "lib/php/functions.php";
        include_once "parts/templates.php";

        $result = makeQuery(
            makeConn(),
            "
            SELECT *
            -- SELECT `id`, `name`, `price`
            FROM `products`
            ORDER BY `name` ASC
            LIMIT 3
            "
        );

        echo "<div class='grid gap'>",array_reduce($result,'productListTemplate'),"</div>";


        ?>

    </div>
    </div>

<div class="container" id="viewWindow">
    <br>
        <div class="view-window" style="background-image: url(img/products/view-window.jpg);"></div>
    </div>  

<div class="container">
    <div class="card soft">
        <h2 class="home-heading"><a href="product_list.php">Our Categories</a></h2>
        <div class="home-grid gap">

            <div class="col-xs-12 col-md-4">
                <figure class="figure product-overlay">
                    <img src="img/products/product_1_2.jpg"  alt=""/>
                    <figcaption>
                        <div class="caption-body">
                            <div>Deco Vase</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-12 col-md-4">
                <figure class="figure product-overlay">
                    <img src="img/products/product_7_3.jpg"  alt=""/>
                    <figcaption>
                        <div class="caption-body">
                            <div>Deco Lamp</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-12 col-md-4">
                <figure class="figure product-overlay">
                    <img src="img/products/product_10_2.jpg"  alt=""/>
                    <figcaption>
                        <div class="caption-body">
                            <div>Deco Wall Decor</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-12 col-md-4">
                <figure class="figure product-overlay">
                    <img src="img/products/product_11.jpg"  alt=""/>
                    <figcaption>
                        <div class="caption-body">
                            <div>Home Decor</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <br>
        </div></div></div>


</body>

<?php include "parts/footer.php"; ?>

</html>