<?php
/*
    TO-DO
        OOP-ify PHP using classes
        Set up form items to use item[] array which pass in quantity and itemID
*/

    if(session_status() == PHP_SESSION_NONE) {
        session_start();    
    }

    $redirect = "index.php";
    $valid = true;

    $expAlphabet = "/^[a-zA-Z ]*$/";
    $expAlphaNumeric = "/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.0-9]*$/"; // Used in ValidatePhone and ValidatePostal
    $expEmail = "/^[a-zA-Z0-9.!#&'*+^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";

    $address = null;
    $city = null;
    $country = null;
    $email = null;
    $name = null;
    $phone = null;
    $postal = null;
    $remember = false;

    $shipping = 0;
    $shoes = null;
    $backpacks = null;

    $calcData = [];

    if (!isset($_POST['address'])) {
        $_SESSION['err-address'] = "Address must not be empty";
    } else {
        if(isset($_SESSION['err-address'])) {
            unset($_SESSION['err-address']);
        }
        $address = SanitizeInput($_POST['address']);
        $_SESSION['address'] = $address;
    }

    if (!isset($_POST['city'])) {
        $_SESSION['err-city'] = "City must not be empty";
    } else {
        if(isset($_SESSION['err-city'])) {
            unset($_SESSION['err-city']);
        }
        $city = SanitizeInput($_POST['city']);
        $_SESSION['city'] = $city;
    }

    if (!isset($_POST['country'])) {
        $_SESSION['err-country'] = "Must select a country";
    } else {
        $result = false;
        
        $country = SanitizeInput($_POST['country']);
        switch($country) {
            case "IE":
                $shipping = 240;
                $result = true;
                break;
            case "GB":
                $shipping = 200;
                $result = true;
                break;
            case "US":
                $shipping = 50;
                $result = true;
                break;
        }
        
        if (!$result) {
            $_SESSION['err-country'] = "Invalid country entered";
        } else {
            if(isset($_SESSION['err-country'])) {
                unset($_SESSION['err-country']);
            }
            $_SESSION['country'] = $country;
            $_SESSION['shipping'] = $shipping;
            
            array_push($calcData, array ('shipping' => $shipping));
        }
    }

    if (!isset($_POST['email'])) {
        $_SESSION['err-email'] = "Must enter an email";
    } else {
        $email = SanitizeInput($_POST['email']);
        if (ValidPattern($expEmail, $email) != 1) {
            $_SESSION['err-email'] = "Not a valid email";
        } else {
            if(isset($_SESSION['err-email'])) {
                unset($_SESSION['err-email']);
            }
            $_SESSION['email'] = $email;
        }
    }

    if (!isset($_POST['name'])) {
        $_SESSION['err-name'] = "Name must not be empty";
    } else {
        $name = SanitizeInput($_POST['name']);
        if (ValidPattern($expAlphabet, $name) != 1) {
            $_SESSION['err-name'] = "Name must only be letters a-z/A-Z and spaces";
        } else {
            if(isset($_SESSION['err-name'])) {
                unset($_SESSION['err-name']);
            }
            $_SESSION['name'] = $name;
        }
    }

    if (!isset($_POST['phone'])) {
        $_SESSION['err-phone'] = "Phone number must not be empty";
    } else {
        $phone = SanitizeInput($_POST['phone']);
        if (ValidPattern($expAlphaNumeric, $phone) != 1 || strlen($phone) < 10) {
            $_SESSION['err-phone'] = "Not a valid phone number";
        } else {
            if(isset($_SESSION['err-phone'])) {
                unset($_SESSION['err-phone']);
            }
            $_SESSION['phone'] = $phone;
        }
    }

    if (!isset($_POST['postal'])) {
        $_SESSION['err-postal'] = "Must be at least 3 digits";
    } else {
        $postal = SanitizeInput($_POST['postal']);
        if (ValidPattern($expAlphaNumeric, $postal) != 1 || strlen($postal) < 3) {
            $_SESSION['err-postal'] = "Must be at least 3 digits";
        } else {
            if(isset($_SESSION['err-postal'])) {
                unset($_SESSION['err-postal']);
            }
            $_SESSION['postal'] = $postal;
        }
    }

    if (isset($_POST['remember']) && $_POST['remember'] == "on") {
        $remember = SanitizeInput($_POST['remember']);
        $_SESSION['remember'] = $remember;
    }

    if (!isset($_POST['bkpk-qty'])) {
        $_SESSION['err-bkpk'] = "Must have at least 1 backpack for example";
    } else {
        $backpacks = (int)SanitizeInput($_POST['bkpk-qty']);
        if(!ValidNumber($backpacks)) {
            $_SESSION['err-bkpk'] = "Must be a numeric value";
        } else {
            if ($backpacks < 1) {
                $_SESSION['err-bkpk'] = "Must have at least 1 backpack for example";
            } else {
                if(isset($_SESSION['err-bkpk'])) {
                    unset($_SESSION['err-bkpk']);
                }
                $_SESSION['bkpk'] = $backpacks;
                
                array_push($calcData, array('price' => 54.99, 'qty' => $backpacks));
            }
        }
    }

    if (!isset($_POST['shoes-qty'])) {
        $_SESSION['err-shoes'] = "Must have at least 1 pair of shoes for example";
    } else {
        $shoes = (int)SanitizeInput($_POST['shoes-qty']);
        if(!ValidNumber($shoes)) {
            $_SESSION['err-shoes'] = "Must be a numeric value";
        } else {
            if ($shoes < 1) {
                $_SESSION['err-shoes'] = "Must have at least 1 pair of shoes for example";
            } else {
                if(isset($_SESSION['err-shoes'])) {
                    unset($_SESSION['err-shoes']);
                }
                $_SESSION['shoes'] = $shoes;
                
                array_push($calcData, array('price' => 74.99, 'qty' => $shoes));
            }
        }
    }

    if (!isset($_SESSION['err-address']) && !isset($_SESSION['err-city']) && !isset($_SESSION['err-country']) && !isset($_SESSION['err-email']) && !isset($_SESSION['err-name']) && !isset($_SESSION['err-phone']) && !isset($_SESSION['err-postal']) && !isset($_SESSION['err-bkpk']) && !isset($_SESSION['err-shoes'])) {
        $price = TotalCalc($calcData);
        $_SESSION['price'] = $price;
        $redirect .= "?success=true";
    }

    header("Location: {$redirect}");


    function PriceCalc ($price, $qty) {
        return $price * $qty;
    }

    function SanitizeInput($input) {
        $input = strip_tags($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    function TotalCalc($data) {
        $bkpkCost = PriceCalc($data[1]['price'], $data[1]['qty']);
        $shoesCost = PriceCalc($data[2]['price'], $data[2]['qty']);
        $total = $bkpkCost + $shoesCost + $data[0]['shipping'];
        $total = round($total, 2); // limit to 2 decimal points
        return $total;
    }

    function ValidNumber($num) {
        return is_numeric($num);
    }

    function ValidPattern($pattern, $string) {
        return preg_match($pattern, $string);
    }
?>