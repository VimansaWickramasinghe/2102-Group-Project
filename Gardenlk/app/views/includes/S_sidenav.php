<div class="column-left"> 
        <div class="column-left-uprow">
            <div class="uprow">
                <!-- profile pic-->
                <img src="<?php echo URLROOT ?>/public/img/<?php echo $_SESSION['shopimg'] ?>" class="shopImg"/>
            </div>           
            <div class="uprow">
                <h5 style="padding:10px 0 0 10px"> &nbsp Hello</h5>
                <h2 style="padding:30px 0 0 0" ><?php echo $_SESSION['seller_name'] ?></h2>
            </div>
            <div class="hrizRuler">
            </div>  
        </div>

        <!-- navigation -->       
        <div class="box1"><ul>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard"><li><div class="box1-row">Dashboard</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/orderhistory"><li><div class="box1-row">Orders</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/store"><li><div class="box1-row">Store</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/notification"><li><div class="box1-row">Notification</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/report"><li><div class="box1-row">Report</div></li></a>
            <div class="dashimg"><img src="<?php echo URLROOT ?>/public/img/dashboardimg.png"></div>
        </div>     
    </div>

    <div class="vertical"></div>