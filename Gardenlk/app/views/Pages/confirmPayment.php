<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/confirmPayment.css">
  <?php include_once APPROOT . '/views/includes/header.php'; ?>
 
<body>


<div class="col-50">

    <button class="tablink" onclick="openPage('Credit/Debit Card', this, '#ffffff')"><img src="<?php echo URLROOT ?>/public/img/cardPayment.png" width="60px" height="60px"><br><br>Credit/Debit Card</button>
    <button class="tablink" onclick="openPage('Cash On Delivery', this, '#ffffff')"><img src="<?php echo URLROOT ?>/public/img/cashonhand.png" width="60px" height="60px"><br><br>Cash On Delivery</button>
 
    <div id="Credit/Debit Card" class="tabcontent">
    <p>
        <div >
            <h3>Online-Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
                <img src="<?php echo URLROOT ?>/public/img/card.png" width="80px" height="40px">
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
                <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
            </div>
            <input type="submit" value="Pay Now" class="btn">

        </div>
    </p>
    </div>

    <div id="Cash On Delivery" class="tabcontent">
        <h3>Cash On Delivery</h3>
        <p>You can pay in cash to our courier when you receive the goods at your doorstep.</p>
        <input type="submit" value="Confirm Order" class="btn">
    </div>
</div>

<div>
<div class="rightCol">
            <h2>Order Summary</h2>
            <div class="text1">Sub Total</div>
            <div class="text2">Rs.1100.00</div>
             
            <div class="text5">Total Amount</div>
            <div class="text6">Rs.1340.00</div>

            <div>
            </div>
        </div>
</div>

 

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</div>



</body>