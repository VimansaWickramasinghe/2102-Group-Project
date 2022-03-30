<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_sellershoppage.css" >
<body>
<?php require APPROOT . '/views/includes/header.php';?>



    <div class="container">
        <div><img src="<?php echo URLROOT ?>/public/img/SellerDetailsbanner1.jpeg" style="width:1519px; height:400px;"></div>
        <div class="wrapper">
            <div class="box1"><h4><a href="<?php echo URLROOT ?>/Sellers/sellerpage"><img src="<?php echo URLROOT ?>/public/img/backbtn.png" style="width:15px; height:15px">Sellers</a></h4></div>
            <div><input type="text" name="search" placeholder="Search..." class="search"></div>            
            
        </div>
        <div class="box">
            <div class="box4"> <img class="prof-img" src="<?php echo URLROOT ?>/public/img/<?php echo $data['seller']-> shopimg; ?>"></div>
            <div class="box5">
                <div><?php echo $data['seller']-> businessName ?></div>
                <div class="rating"> <img src="<?php echo URLROOT ?>/public/img/12.png" class="rating-img">85% positive rating</div>
             </div>
            <div class="box6">Shop Address</div>
            <div class="box7">
                <span><?php echo $data['seller']->businessAddress; ?></span>
                
            </div>
            
        </div>

        <div class="flex-container">
                <div class="plants">
                    <?php foreach($data['plants'] as $plants ): ?>
                        <div class="card">
                            <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>"><img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" style="width:300px; height:320px;"></a>
                            <h5><?php echo $plants->pname; ?></h5>
                            <h4 class="price"><?php echo $plants->price; ?></h4>
                            <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>">
                                <button type="submit" name="add">View More &#128722;</button>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>  
        </div>
        
        
    </div>
    <?php require APPROOT . '/views/includes/footer.php';?>
</body>
