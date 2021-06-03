<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start(); 
    }

    if (isset($_SESSION['address'])) {
        $address = $_SESSION['address'];
    } else {
        $address = null;
    }
    if (isset($_SESSION['city'])) {
        $city = $_SESSION['city'];
    } else {
        $city = null;
    }
    if (isset($_SESSION['country'])) {
        $country = $_SESSION['country'];
    } else {
        $country = null;
    }
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        $email = null;
    }
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
    } else {
        $name = null;
    }
    if (isset($_SESSION['phone'])) {
        $phone = $_SESSION['phone'];
    } else {
        $phone = null;
    }
    if (isset($_SESSION['postal'])) {
        $postal = $_SESSION['postal'];
    } else {
        $postal = null;
    }
    if (isset($_SESSION['remember'])) {
        $remember = $_SESSION['remember'];
    } else {
        $remember = null;
    }
    if (isset($_SESSION['shipping'])) {
        $shipping = $_SESSION['shipping'];
    } else {
        $shipping = 0;
    }
    if (isset($_SESSION['price'])) {
        $price = $_SESSION['price'];
    } else {
        $price = 0;
    }


    if (isset($_SESSION['bkpk'])) {
        $bkpk = $_SESSION['bkpk'];
    } else {
        $bkpk = 1;
    }
    if (isset($_SESSION['shoes'])) {
        $shoes = $_SESSION['shoes'];
    } else {
        $shoes = 1;
    }

    if (isset($_SESSION['orderID'])) {
        $orderId = $_SESSION['orderID'];
    } else {
        $orderId = rand(10000000, 99999999);
        $_SESSION['orderID'] = $orderId;
    }
    $date = date('M d, Y');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Eric Thomas">
	<meta name="description" content="Eric Thomas recreation of the DevChallenges Checkout challenge">
	<title> Your Order Details </title>
	<link rel="shortcut icon" href="img/icon.png">    
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/checkout.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/checkout.js"></script>
</head>
<body>
    <div class="container">
        <h1> Your Order Details </h1>
        <br>
        
        <form method="post" action="checkout.php" id="checkout-form" onsubmit="event.preventDefault(); ValidateForm()">
            <section class="checkout">
                <article class="col-sm-12 info">
                    <div class="row">
                        <div class="col-sm-6">
                            Thank you for your order, <?php echo $name; ?>! We'll send tracking info once your order ships.
                        </div>
                    </div>
                    
                    <div class="clear"> &nbsp; </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <strong> Order Number </strong>
                            <br>
                            <?php echo $orderId; ?>
                            <br><br>
                        </div>
                        <div class="col-sm-6">
                            <strong> Order Date </strong>
                            <br>
                            <?php echo $date; ?>
                            <br><br>
                        </div>
                    </div>
                    
                    <div class="clear"> &nbsp; </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <strong> Shipping Details </strong>
                            <br>
                            <?php echo "{$name} <br> {$address} <br> {$city}, {$postal}, {$country}"; ?>
                        </div>
                    </div>
                    
                    <div class="clear"> &nbsp; </div>
                </article>
                <article class="col-sm-12">
                    <div class="cart">
                        <div class="cart-item">
                            <strong> Levi Shoes </strong>
                            <div class="row">
                                <div class="col-sm-10">
                                    x<?php echo $shoes; ?>
                                </div>
                                <div class="col-sm-2">
                                    $74.99
                                </div>
                            </div>
                        </div>
                        
                        <div class="cart-item">
                            <strong> Vintage Backpack </strong>
                            <div class="row">
                                <div class="col-sm-10">
                                    x<?php echo $bkpk; ?>
                                </div>
                                <div class="col-sm-2">
                                    $54.99
                                </div>
                            </div>
                        </div>
                        
                        <div class="cart-item">
                            <strong> Shipping </strong>
                            <div class="row">
                                <div class="col-sm-10">
                                    &nbsp;
                                </div>
                                <div class="col-sm-2">
                                    $<?php echo $shipping; ?>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="pricing">
                            <strong class="title"> Total </strong>
                            <strong class="price" id="total-price"> $<?php echo $price; ?> </strong>
                        </div>
                    </div>
                </article>
            </section>
        </form>
        
        <div class="clear"> &nbsp; </div>
        <div class="clear"> &nbsp; </div>

        <footer class="row">
            <div class="col-sm-12 center-text">
                Created by <a href="https://github.com/ETstudios" target="_blank">Eric Thomas</a> - <a href="https://devchallenges.io/" target="_blank">devChallenges.io</a>
            </div>
        </footer>
    </div>
</body>
</html>