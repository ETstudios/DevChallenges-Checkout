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

    if (isset($_SESSION['err-address'])) {
        $errAddress = $_SESSION['err-address'];
    } else {
        $errAddress = null;
    }
    if (isset($_SESSION['err-city'])) {
        $errCity = $_SESSION['err-city'];
    } else {
        $errCity = null;
    }
    if (isset($_SESSION['err-country'])) {
        $errCountry = $_SESSION['err-country'];
    } else {
        $errCountry = null;
    }
    if (isset($_SESSION['err-email'])) {
        $errEmail = $_SESSION['err-email'];
    } else {
        $errEmail = null;
    }
    if (isset($_SESSION['err-name'])) {
        $errName = $_SESSION['err-name'];
    } else {
        $errName = null;
    }
    if (isset($_SESSION['err-phone'])) {
        $errPhone = $_SESSION['err-phone'];
    } else {
        $errPhone = null;
    }
    if (isset($_SESSION['err-postal'])) {
        $errPostal = $_SESSION['err-postal'];
    } else {
        $errPostal = null;
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
    if (isset($_SESSION['err-bkpk'])) {
        $errBkpk = $_SESSION['err-bkpk'];
    } else {
        $errBkpk = null;
    }
    if (isset($_SESSION['err-shoes'])) {
        $errShoes = $_SESSION['err-shoes'];
    } else {
        $errShoes = null;
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Eric Thomas">
	<meta name="description" content="Eric Thomas recreation of the DevChallenges Checkout challenge">
	<title> Checkout </title>
	<link rel="shortcut icon" href="img/icon.png">    
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/checkout.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/checkout.js"></script>
</head>
<body onload="TotalCalc()">
    <div class="container">
        <h1> Checkout </h1>
        <br>
        
        <form method="post" action="checkout.php" id="checkout-form" onsubmit="event.preventDefault(); ValidateForm()">
            <section class="checkout">
                <article class="col-sm-12 info">
                    <div class="row">
                        <div class="col-sm-12">
                            <strong> Contact Information </strong>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="email">     
                                <span class="title"> 
                                    Email 
                                    <span id="email-msg" class="error"><?php if($errEmail != null) { echo $errEmail; } ?></span>
                                </span>
                                <input type="email" name="email" id="email" placeholder="Enter your email" onkeyup="ValidateEmail(this)" <?php if ($email != null) { echo "value=\"{$email}\""; } ?>>
                                <span class="label">
                                    <span class="material-icons">mail</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="phone">     
                                <span class="title"> 
                                    Phone 
                                    <span id="phone-msg" class="error"><?php if($errPhone != null) { echo $errPhone; } ?></span>
                                </span>
                                <input type="phone" name="phone" id="phone" placeholder="Enter your phone" onkeyup="ValidatePhone(this)" <?php if ($phone != null) { echo "value=\"{$phone}\""; } ?>>
                                <span class="label">
                                    <span class="material-icons">call</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="clear"> &nbsp;</div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <strong> Shipping Address </strong>    
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="name">     
                                <span class="title"> 
                                    Full Name 
                                    <span id="name-msg" class="error"><?php if($errName != null) { echo $errName; } ?></span>
                                </span>
                                <input type="text" name="name" id="name" placeholder="Enter your name" onkeyup="ValidateName(this)" <?php if ($name != null) { echo "value=\"{$name}\""; } ?>>
                                <span class="label">
                                    <span class="material-icons">account_circle</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="address">     
                                <span class="title"> 
                                    Address 
                                    <span id="address-msg" class="error"><?php if($errAddress != null) { echo $errAddress; } ?></span>
                                </span>
                                <input type="text" name="address" id="address" placeholder="Enter your street address" onkeyup="ValidateAddress(this)" <?php if ($address != null) { echo "value=\"{$address}\""; } ?>>
                                <span class="label">
                                    <span class="material-icons">home</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="city">     
                                <span class="title"> 
                                    City 
                                    <span id="city-msg" class="error"><?php if($errCity != null) { echo $errCity; } ?></span>
                                </span>
                                <input type="text" name="city" id="city" placeholder="Enter your city" onkeyup="ValidateCity(this)" <?php if ($city != null) { echo "value=\"{$city}\""; } ?>>
                                <span class="label">
                                    <span class="material-icons">location_city</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6 country">
                            <label class="input" for="country">
                                <span class="title"> 
                                    Country  
                                    <span id="country-msg" class="error"><?php if($errCountry != null) { echo $errCountry; } ?></span>
                                </span> 
                                <select name="country" id="country" onchange="ShippingUpdate(this); ValidateCountry(this);">
                                    <option value="null"> Your country </option>
                                    <option value="IE" <?php if ($country != null && $country == "IE") { echo "selected"; } ?>> Ireland </option>
                                    <option value="GB" <?php if ($country != null && $country == "GB") { echo "selected"; } ?>> United Kingdom </option>
                                    <option value="US" <?php if ($country != null && $country == "US") { echo "selected"; } ?>> United States </option>
                                </select>
                                <span class="label">
                                    <span class="material-icons">public</span>
                                </span>
                                <span class="arrow">
                                    <span class="material-icons">keyboard_arrow_down</span>
                                </span>
                            </label>  
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="input" for="postal"> 
                                <span class="title"> 
                                    Postal Code 
                                    <span id="postal-msg" class="error"><?php if($errPostal != null) { echo $errPostal; } ?></span>
                                </span>
                                <input type="text" name="postal" id="postal" maxlength="5" placeholder="Enter your postal code" onkeyup="ValidatePostal(this)" <?php if ($postal != null) { echo "value=\"{$postal}\""; } ?>>
                                <span class="label">
                                    <span class="material-icons">markunread_mailbox</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox" name="remember" id="remember" <?php if ($remember != null && $remember != "off") { echo "checked"; } ?>>
                            <label class="checkbox" for="remember"> &nbsp; </label>
                        </div>
                        <div class="col-sm-11">
                            <span class="remember">
                                <span class="subtitle"> Save this information for next time </span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-8"> &nbsp; </div>
                        <div class="col-sm-4">
                            <input type="submit" value="Continue">
                        </div>
                    </div>
                </article>
                <article class="col-sm-12">
                    <div class="cart">
                        <div class="cart-item">
                            <div class="cart-item-thumbnail">
                                <img src="img/backpack.png" alt="Vintage backpack">
                            </div>
                            <div class="cart-item-info">
                                <strong> Vintage Backpack </strong>
                                <br>
                                <span class="sale-price" id="bkpk-sale"> $54.99 </span>
                                <span class="original-price" id="bkpk-original"> $94.99 </span>
                                <div class="qty">
                                    <input type="number" name="bkpk-qty" id="bkpk" min="1" value="<?php echo $bkpk; ?>" onchange="TotalCalc()">
                                    <button class="decrease" type="button" onclick="QtyChange('bkpk', -1)"> - </button>
                                    <button class="increase" type="button" onclick="QtyChange('bkpk', 1)"> + </button>
                                </div>
                            </div>
                        </div>

                        <div class="cart-item">
                            <div class="cart-item-thumbnail">
                                <img src="img/shoes.png" alt="A pair of Levi shoes">
                            </div>
                            <div class="cart-item-info">
                                <strong> Levi Shoes </strong>
                                <br>
                                <span class="sale-price" id="shoes-sale"> $74.99 </span>
                                <span class="original-price" id="shoes-original"> $124.99 </span>
                                <div class="qty">
                                    <input type="number" name="shoes-qty" id="shoes" min="1" value="<?php echo $shoes; ?>" onchange="TotalCalc()">
                                    <button class="decrease" type="button" onclick="QtyChange('shoes', -1)"> - </button>
                                    <button class="increase" type="button" onclick="QtyChange('shoes', 1)"> + </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clear"> &nbsp; </div>
                        <hr>
                        
                        <div class="pricing">
                            <strong class="title"> Shipping </strong>
                            <strong class="price" id="shipping-price"> $<?php echo $shipping; ?> </strong>
                        </div>
                        
                        <hr>
                        
                        <div class="pricing">
                            <strong class="title"> Total </strong>
                            <strong class="price" id="total-price"> $0 </strong>
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