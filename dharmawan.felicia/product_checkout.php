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
    <div class="order-details">
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


</div>    

<br>

<div class="container">
    <div class="form-card">
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
                <p><a href="product_confirmation.php" button type="submit" class="btn-submit">Submit Order</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>