<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>

    <?php include "parts/meta.php"; ?>

    <script src="lib/js/functions.js"></script>
    <script src="js/templates.js"></script>
    <script src="js/product_list.js"></script>

<!--     <script>
        query({type:'products_all'}).then(d=>{
            $(".productlist").html(listItemTemplate(d.result))
        });
    </script> -->

</head>
<body>

    <?php include "parts/navbar.php"; ?>
           
<div class="container">
    <div class="card soft">
        <h2 class="subheading">Product List</h2>

        <div class="search-form">
            <form class="search-container" id="product-search">
                <input type="text" id="search-input" placeholder="Search Products">
                <button id="search-button">Search</button>
            </form>
        </div>

        <div class="form-control display-flex">
            <div class="flex-none">
                <button data-filter="category" data-value="" type="button" class="form-button">All</button>
            </div>
            <div class="flex-none">
                <button data-filter="category" data-value="vase" type="button" class="form-button">Vase</button>
            </div>
            <div class="flex-none">
                <button data-filter="category" data-value="lamp" type="button" class="form-button">Lamp</button>
            </div>
            <div class="flex-none">
                <button data-filter="category" data-value="wall-decor" type="button" class="form-button">Wall Decor</button>
            </div>
            <div class="flex-none">
                <button data-filter="category" data-value="home-decor" type="button" class="form-button">Home Decor</button>
            </div>

            <div class="flex-none">
            <select id="sort-dropdown" class="form-dropdown">
                <option value="price_desc">Most Expensive</option>
                <option value="price_asc">Least Expensive</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
            </div>
        </div>




        <div class='productlist grid gap'></div>

    </div>
</div>
        

        <?php

        // include_once "lib/php/functions.php";
        // include_once "parts/templates.php";

        ?>

                

</body>
</html>