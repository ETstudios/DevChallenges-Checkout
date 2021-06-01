var shipping = 0;

function ValidateForm() {
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var name = document.getElementById("name");
    var address = document.getElementById("address");
    var city = document.getElementById("city");
    var country = document.getElementById("country");
    var postal = document.getElementById("postal");
    var remember = document.getElementById("remember");
    
    // return true OR return array of errors that gets put into message
}

function PriceCalc(item) {
    var qty = document.getElementById(item).value;    
    var price = document.getElementById(item + "-sale").innerHTML;
    
    price = price.substring(2, price.length);
    price = parseFloat(price);
    
    return qty * price;
}

function QtyChange(item, dir) {
    var itemInfo = document.getElementById(item);
    var itemQty = parseInt(itemInfo.value);
    
    if(dir == -1 && itemQty - 1 <= 0) {
        itemQty = 1;
    } else {
        itemQty += dir;
    }
    
    itemInfo.value = itemQty;
    
    TotalCalc();
}

function ShippingUpdate(country) {
    var shippingText = document.getElementById("shipping-price");
    
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
    var totalText = document.getElementById("total-price");
    
    var bkpkCost = PriceCalc("bkpk");
    var shoesCost = PriceCalc("shoes");
    var total = bkpkCost + shoesCost + shipping;
    total = total.toFixed(2);
    
    totalText.innerHTML = "$" + total;
}