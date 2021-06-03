var shipping = 0;

function Message(msgText, msg) {
    msgText.innerHTML = msg;
}

function PriceCalc(item) {
    let qty = document.getElementById(item).value;    
    let price = document.getElementById(item + "-sale").innerHTML;
    
    price = price.substring(2, price.length);
    price = parseFloat(price);
    
    return qty * price;
}

function QtyChange(item, dir) {
    let itemInfo = document.getElementById(item);
    let itemQty = parseInt(itemInfo.value);
    
    if(dir == -1 && itemQty - 1 <= 0) {
        itemQty = 1;
    } else {
        itemQty += dir;
    }
    
    itemInfo.value = itemQty;
    
    TotalCalc();
}

function ShippingUpdate(country) {
    let shippingText = document.getElementById("shipping-price");
    
    switch(country.value) {
        default:
            shipping = 0;
            break;
        case "IE":
            shipping = 240;
            break;
        case "GB":
            shipping = 200;
            break;
        case "US":
            shipping = 50;
            break;
    }
    
    shippingText.innerHTML = "$" + shipping;
    TotalCalc();
}

function TotalCalc() {
    let totalText = document.getElementById("total-price");
    
    let bkpkCost = PriceCalc("bkpk");
    let shoesCost = PriceCalc("shoes");
    let total = bkpkCost + shoesCost + shipping;
    total = total.toFixed(2);
    
    totalText.innerHTML = "$" + total;
}

function ValidateAddress(address) {
    let result = false;
    let msg = null;
    
    if (address.value == "") {
        msg = "Address must not be empty";
    } else {
        result = true;
    }
    Message(document.getElementById("address-msg"), msg);
    return result;
}

function ValidateCity(city) {
    let result = false;
    let msg = null;
    
    if (city.value == "") {
        msg = "City must not be empty";
    } else {
        result = true;
    }
    Message(document.getElementById("city-msg"), msg);
    return result;
}

function ValidateCountry(country) {
    let result = false;
    let msg = null;
    
    switch(country.value) {
        case "IE":
        case "GB":
        case "US":
            result = true;
            break;
    }
    
    if(!result) {
        msg = "Must select a country";
    }
    Message(document.getElementById("country-msg"), msg);
    return result;
}

function ValidateEmail(email) {
    let result = false;
    let msg = null;
    let pattern = /^[a-zA-Z0-9.!#&'*+^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if (!email.value.match(pattern) || email.value == "") {
        msg = "Not a valid email";
    } else {
        result = true;
    }
    Message(document.getElementById("email-msg"), msg);
    return result;
}

function ValidateForm() {
    let result = false;
    
    let email = document.getElementById("email");
    let emailVal = ValidateEmail(email);
    
    let phone = document.getElementById("phone");
    let phoneVal = ValidatePhone(phone);
    
    let name = document.getElementById("name");
    let nameVal = ValidateName(name);
    
    let country = document.getElementById("country");
    let countryVal = ValidateCountry(country);   
    
    let postal = document.getElementById("postal");
    let postalVal = ValidatePostal(postal);
    
    let address = document.getElementById("address");
    let addressVal = ValidateAddress(address);
    
    let city = document.getElementById("city");
    let cityVal = ValidateCity(city);
    
    let remember = document.getElementById("remember");
    let rememberVal = false;
    if(remember.checked) {
        rememberVal = true;
    }
    
    if(emailVal != false && phoneVal != false && nameVal != false && countryVal != false && postalVal != false && addressVal != false && cityVal != false) {
        document.getElementById("checkout-form").submit();
    }
    
    return result;
}

function ValidateName(name) {
    let result = false;
    let msg = null;
    let pattern = /^[a-zA-Z ]*$/;
    
    if(name.value == "") {
        msg = "Name must not be empty";
    } else if (!name.value.match(pattern)) {
        msg = "Name must only be letters a-z/A-Z and spaces";
    } else {
        result = true;
    }
    Message(document.getElementById("name-msg"), msg);
    return result;
}

function ValidatePhone(phone) {
    let result = false;
    let msg = null;
    let pattern = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
    
    if (!phone.value.match(pattern) || phone.value.length < 10) {
        msg = "Not a valid phone number";
    } else {
        result = true;
    }
    Message(document.getElementById("phone-msg"), msg);    
    return result;
}

function ValidatePostal(postal) {
    let result = false;
    let msg = null;
    let pattern = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
    
    if (!postal.value.match(pattern) || postal.value.length < 3) {
        msg = "Must be at least 3 digits";
    } else {
        result = true;
    }
    Message(document.getElementById("postal-msg"), msg);
    return result;
}