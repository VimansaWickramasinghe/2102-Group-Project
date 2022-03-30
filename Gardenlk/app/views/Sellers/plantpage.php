<link rel="stylesheet" href="../public/css/S_plantpage.css">
<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <div class="container" style="margin-top:-180px;">
        <div><img src="<?php echo URLROOT ?>/public/img/plantspage1.jpg" style="width:100%; height:500px">
            <h1 class="plantsTopic">PLANTS</h1>
        </div>

        <div class="wrapper">
            <div class="leftcol">
                <h3>Plant Category</h3><br>
                <a href="<?php echo URLROOT ?>/Sellers/category_tablePlant#TOP">
                    <div class="box">Table Plant</div>
                </a>
                <a href="<?php echo URLROOT ?>/Sellers/category_pottedPlant#TOP">
                    <div class="box">Potted Plant</div>
                </a>
                <a href="<?php echo URLROOT ?>/Sellers/category_housePlant#TOP">
                    <div class="box">House Plant</div>
                </a>
                <a href="<?php echo URLROOT ?>/Sellers/category_outdoorPlant#TOP">
                    <div class="box">Outdoor Plant</div>
                </a>
                <a href="<?php echo URLROOT ?>/Sellers/category_flowerPlant#TOP">
                    <div class="box">Flower Plant</div>
                </a>
                <a href="<?php echo URLROOT ?>/Sellers/category_otherPlant#TOP">
                    <div class="box">Other Plants</div>
                </a>


            </div>
            <div class="vertical"></div>

            <div>
                <div class="rightcol" id="TOP">
                    <!-- <span id="search">Sort By: 
                        <select id="list" onchange="search()" class="dropdown-content">
                            <option class="option-tag">Price-Asc</a></option>
                            <option>Price-Des</a></option>
                            <option><a href="#abc">Date-New-Old</a></option>
                        </select>
                    </span> -->
                    <!--                         <input type="text" name="search" placeholder="Search..." class="search">              
 -->
                </div>

                <div class="ex1">
                    <div class="flex-container">
                        <div class="plants">
                            <?php foreach ($data['plants'] as $plants) : ?>
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
            </div>
        </div>
    </div>
</body>
<?php require APPROOT . '/views/includes/footer.php'; ?>