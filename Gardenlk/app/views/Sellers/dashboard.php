<?php require APPROOT . '/views/includes/header.php';?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_dashboard.css">

<body>

<div class="container">
<?php require APPROOT . '/views/includes/S_sidenav.php';?>
 
<div class="column-right">
    <div><h1 style="padding:0px 0 0 400px">DashBoard </h1></div><br>
                                                    <!-------------------------Row count--------------------------->
        <div class="box-list">
            <div class="box2"><?php echo $data['completeCount'][0]->completeCount ?><br>Completed</div>
            <div class="box2"><?php echo $data['pendingCount'][0]->pendingCount ?><br>To Deliver</div>
            <div class="box2"><?php echo $data['pendingplantsCount'][0]->pendingplantsCount ?><br>Pending Plants</div>
            <div class="box2"><?php echo $data['plantsCount'][0]->plantsCount ?><br>Plants</div> <!-- count -->
        </div><br>
        <div class="box-list2">                 <!----------------------------buttons -done ------------------------------->
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_completed" id="text"><div><button name="complete" class="box3" >Completed</button></div></a>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_pending" id="text"><div><button name="pending" class="box3" >Pending</button></div></a>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_cancelled" id="text"><div><button name="cancelled" class="box3">Pending Plants</button></div></a>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_plants" id="text"><div><button name="plants" class="box3">Plants</button></div></a>
        </div>
        
        <div class="">
            
        </div> 
        <!----------------top selling -done------------------->
        <div class="box-list">
            <div class="box4">
                <table class="top-table"> 
                    <tr><th><b>Top selling<br></b></th></tr>
                    <?php foreach($data['topPlant'] as $topPlants ) : ?>  
                    <tr><td>
                        <img src="<?php echo URLROOT ?>/public/img/<?php echo $topPlants->img1; ?>"  style="height:80px; width: 80px">
                    </td></tr><br />
                    <?php endforeach; ?>
                </table>
                    
            </div>
         <!---------------top rated------------------>
            <div class="box4">Top rated<br /><br />
                <table class="top-table"> 
                    <!--<tr><th><b>Top Rating<br></b></th></tr>
                    <?php foreach($data['topRating'] as $topRating ) : ?>  
                    <tr><td>
                        <img src="<?php echo URLROOT ?>/public/img/<?php echo $topPlants->img1; ?>"  style="height:80px; width: 80px">
                    </td></tr><br />
                    <?php endforeach; ?>-->
                </table>
            </div>
        </div>
    </div>  
</div>
<?php require APPROOT . '/views/includes/footer.php';?>
</body>
<!-- <div class=""><img src="b.png" style="width:300px; height:400px" margin="200px 10px 0 20px;"></div>-->