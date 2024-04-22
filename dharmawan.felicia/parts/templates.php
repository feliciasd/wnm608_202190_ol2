<?php

function productListTemplate($r,$o) {
	return $r.<<<HTML
    <a class="col-xs-12 col-md-4" href="product_item.php?id=$o->id">
        <figure class="figure product">
            <img src="$o->thumbnail" alt=""/>
            <figcaption>
                <div class ="caption-body">$o->name</div>
                <div>&dollar;$o->price</div>
            </figcaption>
        </figure>
    </a>

HTML;
}


function cartListTemplate($r, $o) {
    return $r . <<<HTML
    <div class="cart-item grid gap">
        <div class="col-xs-12 col-md-3">
            <div class="cart-thumbnails">
                <img src="$o->thumbnail" alt="$o->name" class="img-responsive">
            </div>
        </div>
        <div class="col-xs-12 col-md-5">
            <div class="cart-product-info">
                <div class="cart-product-name">$o->name</div>
                <div class="cart-price">&dollar;$o->price</div>
                <div class="product-remove"><a href="#">Remove</a></div>
            </div>
        </div>
        <div class="col-xs-12 col-md-2">
            <div class="product-quantity"><input type="number" value="1" min="1" class="form-input"></div>
        </div>
        
    </div>
HTML;
}
