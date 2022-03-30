<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_plant.css">

<body>

    <div class="row1">
        <div class="column1">
            <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $data['plant']-> img2 ?>" class="img"></div>
            <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $data['plant']-> img3 ?>" class="img"></div>
            <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $data['plant']-> img4 ?>" class="img"></div>
        </div>
        <div class="column2">
            <img src="<?php echo URLROOT ?>/public/img/<?php echo $data['plant']-> img1 ?>" class="img2">
        </div>
    
        <div class="box1">
            <a href="<?php echo URLROOT; ?>/Sellers/plantpage"><h4 style=""><img src="<?php echo URLROOT ?>/public/img/backbtn.png"></h4></a>

            <h1><b><?php echo $data['plant']-> pname ?></b></h1>
            <p>Sold By: <h3><?php echo $data['plant']-> businessName ?></h3></p>
 
            <?php if($data['plant']-> NoOfPlants == 0){ ?>
                <p class="unavailability">Out of stock</p>
            <?php 
            }else{?>
                <p class="availability">In stock</p>
            <?php }?>
            


            <p><h3>Rs.<?php echo $data['plant']-> price ?></h3></p>
                <div class="btn">
                <form action="<?php echo URLROOT; ?>/pages/cart" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $data['plant']->plant_id; ?>">
                    <input type="number" id="quantity" name="quantity" min="0" max="20" step="1" value="1">
                    <?php if($data['plant']-> NoOfPlants == 0){ ?>
                     <?php 
                    }else{?>
                    <button class="submit" name="add">Add to cart </button>
                    <?php }?>
                </form>
                </div>
             <br>           
            <p>Description:</p><div class="description"><?php echo $data['plant']-> description ?></div>
        </div>
    </div>

    <hr style="width:95%">



<div class="col-50">

    <button class="tablink" onclick="openPage('CustomerR', this, '#ffffff')"><br><br>CUSTOMER REVIEW</button>
    <button class="tablink" onclick="openPage('VendorR', this, '#ffffff')"><br><br>VENDER REVIEW</button>
 
    <div id="CustomerR" class="tabcontent">
        <div>
                More Reviews<br><br>
                <div class="review-box">
                    <div class="row">
                        <img src="<?php echo URLROOT ?>/public/img/profile1.png" class="img-user">
                        <h4>Name of the user</h4>
                    </div>
                    <div class="row">
                        <p>The plant is in good condition. and the price is best. recommend 
                            this.The plant is in good condition. and the price is best. recommend this.</p>
                    </div>
                </div>

                <div class="review-box">
                <div class="row">
                    <img src="<?php echo URLROOT ?>/public/img/profile1.png" class="img-user">
                    <h4>Name of the user</h4>
                </div>
                <div class="row">
                    <p>The plant is in good condition. and the price is best. recommend 
                        this.The plant is in good condition. and the price is best. recommend this.</p>
                </div>
            </div>
        </div>
    </div>
    

    <div id="VendorR" class="tabcontent" style="display:none">
        <div>
            star rewiew 1 2 3 4 5 <br><br>
            <div class="review-box">
                <div class="row">
                    <img src="<?php echo URLROOT ?>/public/img/profile1.png" class="img-user">
                    <h4>Name of the user</h4>
                </div>
                <div class="row">
                    <p>The plant is in good condition. and the price is best. recommend 
                        this.The plant is in good condition. and the price is best. recommend this.</p>
                </div>
            </div>

            <div class="review-box">
                <div class="row">
                    <img src="<?php echo URLROOT ?>/public/img/profile1.png" class="img-user">
                    <h4>Name of the user</h4>
                </div>
                <div class="row">
                    <p>The plant is in good condition. and the price is best. recommend 
                        this.The plant is in good condition. and the price is best. recommend this.</p>
                </div>
            </div>
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

<?php include_once APPROOT . '/views/includes/footer.php'; ?> 

</body>
</html>