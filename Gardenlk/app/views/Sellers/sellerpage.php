<link rel="stylesheet" href="../public/css/S_sellerpage.css">


<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <div class="container" style="margin-top:-180px;">
        <div class="sellerBannerContent fade">Join a Vibrant,<br> Growing Community of<br> Like Minded People</div>
        <div><img src="<?php echo URLROOT ?>/public/img/sellersBanner.jpg">
            <h1 class="sellersBanner">SELLERS</h1>
        </div>
    </div>
    <div class="wrapper">

        <div> </div>
        <div class="box2">
            <h3></h3>
        </div>
        <div> </div>

        <?php foreach ($data['seller'] as $seller) : ?>
            <a href="<?php echo URLROOT; ?>/sellers/sellershoppage/<?php echo $seller->seller_id; ?>">
                <div class="box">
                    <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $seller->shopimg; ?>" class="prof-img">
                        <h3 class="shopName"><?php echo $seller->businessName; ?></h3>
                    </div>

                    <div class="plants">

                        <div class="plant-box">
                            <div class="plant-img"><?php echo $seller->businessAddress; ?> </div>
                            <div><?php echo $seller->city; ?></div>
                        </div>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>
</body>