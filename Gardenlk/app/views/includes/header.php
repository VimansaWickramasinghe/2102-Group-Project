<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/header.css">
</head>


<body>
    <div class="header-menu">
        <div class="top">
            <div class="box2header">

                <!-- navigation after loggin -->
                <a href="<?php echo URLROOT; ?>/pages/index"><img src="<?php echo URLROOT ?>/public/img/LOGO.png" alt="abc" style="width:127px; height:39px; margin:15px;"></a>
            </div>

            <div class="hleft">
                <a href="<?php echo URLROOT; ?>/pages/index">
                    <div class="hsocial-item"><span class="header-menu-text">Home </span></div>
                </a>
                <a href="<?php echo URLROOT; ?>/Sellers/plantpage">
                    <div class="hsocial-item"><span class="header-menu-text">Plants </span></div>
                </a>
                <a href="<?php echo URLROOT; ?>/Sellers/sellerpage">
                    <div class="hsocial-item"><span class="header-menu-text">Sellers </span></div>
                </a>
                <!--        <a href="<?php echo URLROOT; ?>/pages/forum"><div class="hsocial-item"><span class="header-menu-text">Forum</span></div></a>
 -->
            </div>

            <!-- if customer logged in -->

            <?php if (isset($_SESSION['cus_id'])) : ?>

                <div class="hright">
                    <a href="<?php echo URLROOT; ?>/Customers/C_Notification"><img src="<?php echo URLROOT ?>/public/img/bell.png" alt="" class="icon"></a>
                    <a href="<?php echo URLROOT; ?>/Customers/C_AccountIndex"><img src="<?php echo URLROOT ?>/public/img/Customer.png" alt="" class="icon"></a>
                    <a href="<?php echo URLROOT; ?>/pages/cart"><img src="<?php echo URLROOT ?>/public/img/cart.png" alt="" class="icon"></a>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                    } else {
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                    }

                    ?>
                </div>

                <!-- if driver logged in -->

            <?php elseif (isset($_SESSION['driver_id'])) : ?>


                <div class="logoutbutton-hright">
                    <a class="login" href="<?php echo URLROOT; ?>/users/Driverlogout">LogOut</a>
                </div>
                <div class="driver-hright">
                    <a href="<?php echo URLROOT; ?>/Drivers/Dprofile"><img src="<?php echo URLROOT ?>/public/img/Customer.png" alt="" class="icon"></a>
                    <!-- <a href="<?php echo URLROOT; ?>/pages/cart"><img src="<?php echo URLROOT ?>/public/img/cart.png" alt="" class="icon"></a> -->

                </div>


                <!-- if seller logged in -->

            <?php elseif (isset($_SESSION['seller_id'])) : ?>


                <div class="logoutbutton-hright">
                    <a class="login" href="<?php echo URLROOT; ?>/users/Sellerlogout">Logout</a>
                </div>
                <div class="driver-hright">
                    <a href="<?php echo URLROOT; ?>/Sellers/SellerProfile"><img src="<?php echo URLROOT ?>/public/img/Customer.png" alt="" class="icon"></a>
                    <a href="<?php echo URLROOT; ?>/sellers/dashboard"><img src="<?php echo URLROOT ?>/public/img/dashboard.png" alt="" class="icon"></a>
                </div>

            <?php else : ?>
                <div class="button-hright">
                    <a class="login" href="<?php echo URLROOT; ?>/users/login">Login</a>
                </div>
            <?php endif; ?>

        </div>
    </div>