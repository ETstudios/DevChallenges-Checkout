<?php
    // $_POST validation
    // $_POST sanitization
    // Ensure correct value types
    // Quantities can't be below 1
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
        
        <form method="post" action="#" id="checkout-form">
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
                                <span class="title"> Email </span>
                                <input type="email" name="email" id="email" placeholder="Enter your email">
                                <span class="label">
                                    <span class="material-icons">mail</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="phone">     
                                <span class="title"> Phone </span>
                                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
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
                                <span class="title"> Full Name </span>
                                <input type="text" name="name" id="name" placeholder="Enter your name">
                                <span class="label">
                                    <span class="material-icons">account_circle</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="address">     
                                <span class="title"> Address </span>
                                <input type="text" name="address" id="address" placeholder="Enter your street address">
                                <span class="label">
                                    <span class="material-icons">home</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="city">     
                                <span class="title"> City </span>
                                <input type="text" name="city" id="city" placeholder="Enter your city">
                                <span class="label">
                                    <span class="material-icons">location_city</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6 country">
                            <label class="input" for="country">
                                <span class="title"> Country  </span> 
                                <select name="country" id="country" onchange="ShippingUpdate(this);">
                                    <option value="null"> Your country </option>
                                    <option value="IE"> Ireland </option>
                                    <option value="GB"> United Kingdom </option>
                                    <option value="US"> United States </option>
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
                                <span class="title"> Postal Code  </span>
                                <input type="text" name="postal" id="postal" maxlength="5" placeholder="Enter your postal code">
                                <span class="label">
                                    <span class="material-icons">markunread_mailbox</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox" name="remember" id="remember">
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
                            <input type="submit" onsubmit="" value="Continue">
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
                                    <input type="number" name="bkpk-qty" id="bkpk" min="1" value="1" onchange="TotalCalc()">
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
                                    <input type="number" name="shoes-qty" id="shoes" min="1" value="1" onchange="TotalCalc()">
                                    <button class="decrease" type="button" onclick="QtyChange('shoes', -1)"> - </button>
                                    <button class="increase" type="button" onclick="QtyChange('shoes', 1)"> + </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clear"> &nbsp; </div>
                        <hr>
                        
                        <div class="pricing">
                            <strong class="title"> Shipping </strong>
                            <strong class="price" id="shipping-price"> $0 </strong>
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