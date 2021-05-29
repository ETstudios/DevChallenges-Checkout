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
            <section class="row checkout">
                <article class="col-sm-12 col-md-8">
                    <strong> Contact Information </strong>
                    <br>
                    <label for="email"> Email </label>
                    <br>
                    <input type="email" name="email" id="email">
                    <br>
                    <label for="phone"> Phone </label>
                    <br>
                    <input type="phone" name="phone" id="phone">
                    
                    <br><br>
                    <strong> Shipping Address </strong>
                </article>
                <article class="col-sm-12 col-md-4">
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