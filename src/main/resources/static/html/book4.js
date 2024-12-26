//open and close cart
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener('click', ()=>{
    cart.classList.add("active");
});
closeCart.addEventListener('click', ()=>{
    cart.classList.remove("active");
});

//start when the document is ready
if(document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded', start);
}else{
    start();
}

// ==============START==============
function start(){
    addEvents();
}

//==================update & rerender===================
function update(){
    addEvents();
    updateTotal();
}

//===================add events=====================
function addEvents(){
    //remove items from the cart
    let cartRemove_btns = document.querySelectorAll('.cart-remove');
    console.log(cartRemove_btns);
    cartRemove_btns.forEach((btn) =>{
        btn.addEventListener("click", handle_removeCartItem);
    });

    //change item quantity
    let cartQuantity_inputs = document.querySelectorAll('.cart-quantity');
    cartQuantity_inputs.forEach((input) =>{
        input.addEventListener("change", handle_changeItemQuantity);

    });

    //add item to cart
    let addCart_btns = document.querySelectorAll(".add-cart");
    addCart_btns.forEach(btn =>{
        btn.addEventListener("click", handle_addCartItem);
    });

    //buy order
    const buy_btn = document.querySelector(".btn-buy");
    buy_btn.addEventListener("click", handle_buyOrder);
}


//======================= handle event functions =================

let itemsAdded = [];

function handle_addCartItem(){
    let product = this.parentElement;
    let title = product.querySelector(".product-title").innerHTML;
    let priceText = product.querySelector(".product-price").innerHTML;
    let price = parseFloat(priceText.replace(/[^\d.]/g, ''));
    let imgSrc = product.querySelector(".product-img").src;
    let quantity = 1;
    console.log(title, price, imgSrc, quantity);

    let newToAdd = {
        title,
        price,
        imgSrc,
        quantity,
    };

    //handle item is already exist
    if(itemsAdded.find(el => el.title == newToAdd.title)){
        alert("This Item is Already Existed!");
        return;
    }else{
        itemsAdded.push(newToAdd);
    }

    //add product to cart
    let cartBoxElement = CartBoxComponent(title, priceText, imgSrc);
    let newNode = document.createElement("div");
    newNode.innerHTML = cartBoxElement;
    const cartContent = cart.querySelector(".cart-content");
    cartContent.appendChild(newNode);

    update();
}

function handle_removeCartItem(){
    this.parentElement.remove();
    itemsAdded = itemsAdded.filter(el => 
        el.title != 
        this.parentElement.querySelector('.cart-product-title').innerHTML
    );

    update();
}

function handle_changeItemQuantity() {
    if (isNaN(this.value) || this.value < 1) {
      this.value = 1;
    }
    this.value = Math.floor(this.value); // to keep it integer
  
    // Get the index of the item in itemsAdded based on its title
    const index = itemsAdded.findIndex(el => el.title === this.parentElement.querySelector('.cart-product-title').innerHTML);
  
    if (index !== -1) {
      // Update the quantity value in itemsAdded array
      itemsAdded[index].quantity = parseInt(this.value);
    }
  
    update();
  }

  
function sending_data(){
    // Assuming you have the itemsAdded array populated with data

    // Convert the itemsAdded array to JSON
    const itemsJSON = JSON.stringify(itemsAdded);

    // Create an AJAX request
    const xhr = new XMLHttpRequest();
    const url = "booking4.php"; // Replace with the URL of your PHP script

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    // Handle the response from the PHP script
    xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
        // Request successful
        console.log(xhr.responseText);
        } else {
        // Error occurred
        console.error("Error: " + xhr.status);
        }
    }
    };

    // Send the data to the PHP script
    xhr.send(itemsJSON);


}

function handle_buyOrder(){
    if(itemsAdded.length <= 0){
        alert("There is No Order to Place \n Please Make an Order First.");
        return;
    }

    sending_data();
    const cartContent  = cart.querySelector(".cart-content");
    cartContent.innerHTML = '';
    alert("Your Order is Placed Successfully!");
    const total = getTotal();

    window.location.href = "booking4.php?total=" + (total);
    
    itemsAdded = [];

    update();

}

function getTotal() {
    let cartBoxes = document.querySelectorAll(".cart-box");
    let total = 0;
    cartBoxes.forEach((cartBox) => {
        let priceElement = cartBox.querySelector('.cart-price');
        let price = parseFloat(priceElement.innerHTML.replace("RM", ""));
        let quantity = cartBox.querySelector(".cart-quantity").value;
        total += price * quantity;
    });

    // Keep 2 digits after the decimal point
    total = total.toFixed(2);

    return total;
}

//==================update & rerender function ==================
function updateTotal(){
    let cartBoxes = document.querySelectorAll(".cart-box");
    const totalElement = cart.querySelector(".total-price");
    let total = 0;
    cartBoxes.forEach((cartBox) =>{
        let priceElement = cartBox.querySelector('.cart-price');
        let price = parseFloat(priceElement.innerHTML.replace("RM",""));
        let quantity = cartBox.querySelector(".cart-quantity").value;
        total += price * quantity;
    });

   
    //keep 2 digits after the decimal point
    total = total.toFixed(2);
    //or you can use also
    // total = Math.round(total*100)/100;

    totalElement.innerHTML = "RM" + total;
    
    // window.location.href = 'book5.php?total=' + encodeURIComponent(total);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "booking4.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var data = "total=" + encodeURIComponent(total);
    xhr.send(data);
}

// =================html component ======================

function CartBoxComponent(title, priceText, imgSrc){
    return`
        <div class="cart-box">
            <img src="${imgSrc}" alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">${priceText}</div>
                <input type="number" value="1" class="cart-quantity">
            </div>
            <!-- REMOVE CART  -->
            <i class="bx bxs-trash-alt cart-remove"></i>
            </div>`;
}
                        