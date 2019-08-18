var numpattern = /\d+/;
    
// Event handler to validate input of 'Quantity' 
function validateQtyInput() {
    var apples = document.getElementById("appleqty").value;
    var oranges = document.getElementById("orangeqty").value;
    var bananas = document.getElementById("bananaqty").value;

    //Checks if input is a number 
    if( !numpattern.test(apples) || !numpattern.test(oranges) || !numpattern.test(bananas)){

        if (!numpattern.test(apples)){
            document.getElementById("appleqty").value = 0;
            document.getElementById("appleprice").value = "0.00";
        } else if (!numpattern.test(oranges)){
            document.getElementById("orangeqty").value = 0;
            document.getElementById("orangeprice").value = "0.00";
        } else {
            document.getElementById("bananaqty").value = 0;
            document.getElementById("bananaprice").value = "0.00";
        }

        alert("Please input numbers only!");
    }

    //Checks if input is a negative number
    if( apples<0 || oranges<0 || bananas<0){

        if (apples<0){
            document.getElementById("appleqty").value = 0;
            document.getElementById("appleprice").value = "0.00";
        } else if (oranges<0){
            document.getElementById("orangeqty").value = 0;
            document.getElementById("orangeprice").value = "0.00";
        } else {
            document.getElementById("bananaqty").value = 0;
            document.getElementById("bananaprice").value = "0.00";
        }

        alert("Please input only positive numbers!");

    }

}

// Event handler to compute price of all apples
function computeApplePrice(){

    var apples = document.getElementById("appleqty").value;

    //Calculate total price of apple(s)
    appleprice = apples * 0.69;

    //Round off price to 2 decimal places
    appleprice = appleprice.toFixed(2);

    document.getElementById("appleprice").value = appleprice;

}

// Event handler to compute price of all oranges
function computeOrangePrice(){

    var oranges = document.getElementById("orangeqty").value;

    //Calculate total price of orange(s)
    orangeprice = oranges * 0.59;

    //Round off price to 2 decimal places
    orangeprice = orangeprice.toFixed(2);

    document.getElementById("orangeprice").value = orangeprice;

}

// Event handler to compute price of all bananas
function computeBananaPrice(){

    var bananas = document.getElementById("bananaqty").value;

    //Calculate total price of banana(s)
    bananaprice = bananas * 0.39;

    //Round off price to 2 decimal places
    bananaprice = bananaprice.toFixed(2);

    document.getElementById("bananaprice").value = bananaprice;

}

// Event handler to compute total price
function computeTotalPrice(){

    var appleprice = document.getElementById("appleprice").value;
    var orangeprice = document.getElementById("orangeprice").value;
    var bananaprice = document.getElementById("bananaprice").value;

    //Calculate total price of all items
    totalprice = Number(appleprice) + Number(orangeprice) + Number(bananaprice);

     //Round off price to 2 decimal places
    totalprice = totalprice.toFixed(2);
    
    document.getElementById("totalprice").value = totalprice;

}

// Event handler to check if a payment method has been selected
function checkPayment(){

    if(!document.getElementById('Visa').checked && !document.getElementById('Mastercard').checked && !document.getElementById('Discover').checked){
        alert("Please select a payment method!");
        event.preventDefault();
        return false;
    }
    return true;

}

// Event handler to check if a name has been inputted
function checkName(){

    var name=document.getElementById("nameinput").value;
    
    if(name.length < 1){
        alert("Please enter your name!");
        event.preventDefault();
        return false;
    }
    return true;


}

function checkOrder(){

    var apples = document.getElementById("appleqty").value;
    var oranges = document.getElementById("orangeqty").value;
    var bananas = document.getElementById("bananaqty").value;

    
    if(checkName() && checkPayment()){
        if(apples == 0 && oranges == 0 && bananas == 0){
            alert("You have not ordered any items!");
            event.preventDefault();
            
        }
        
    }


}