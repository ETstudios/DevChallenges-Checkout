<?php
   // $_POST PHP validation
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
<body>
    <div class="container">
        <h1> Checkout </h1>
        <br>
        
        <form method="post" action="#">
            <section class="checkout row">
                <article class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <strong> Contact Information </strong>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="email">     
                                <span class="title"> Email </span>
                                <input type="email" name="email" id="email">
                                <span class="label">
                                    <span class="material-icons">mail</span>
                                    <span class="subtitle"> Enter your email </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="phone">     
                                <span class="title"> Phone </span>
                                <input type="phone" name="phone" id="phone">
                                <span class="label">
                                    <span class="material-icons">call</span>
                                    <span class="subtitle"> Enter your phone </span>
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
                                <input type="text" name="name" id="name">
                                <span class="label">
                                    <span class="material-icons">account_circle</span>
                                    <span class="subtitle"> Enter your name </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="address">     
                                <span class="title"> Address </span>
                                <input type="text" name="address" id="address">
                                <span class="label">
                                    <span class="material-icons">home</span>
                                    <span class="subtitle"> Enter your street address </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="input" for="city">     
                                <span class="title"> City </span>
                                <input type="text" name="city" id="city">
                                <span class="label">
                                    <span class="material-icons">location_city</span>
                                    <span class="subtitle"> Enter your city </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6 country">
                            <label class="input" for="country">
                                <span class="title"> Country  </span> 
                                <select name="country" id="country">
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
                            <br><br>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="input" for="postal"> 
                                <span class="title"> Postal Code  </span>
                                <input type="text" name="postal" id="postal" maxlength="5">
                                <span class="label">
                                    <span class="material-icons">markunread_mailbox</span>
                                    <span class="subtitle"> Enter your postal code </span>
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
                    Vintage Backpack
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