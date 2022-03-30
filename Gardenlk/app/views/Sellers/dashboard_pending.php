<?php require APPROOT . '/views/includes/header.php';?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_dashboard.css">

<body>
<div class="container">
   
<?php require APPROOT . '/views/includes/S_sidenav.php';?>

    <div class="column-right">
    <?php require APPROOT . '/views/includes/S_topnav.php';?>
<br>
        
<div class="frame">
<!--Orders to be delivered-->
<div id="ex1"> 
                <?php foreach($data['orders'] as $pending ) : ?>
                    <div class="box">
                        <div style="width:25%;" class="box-column">
                            <h4 id="box-row2" class="topic-text">Order Date</h4>
                            <h3 id="box-row2"><?php echo $pending->createdOn; ?></h3>
                        </div>            
                        <div style="width:25%;" class="box-column" >
                            <h4 id="box-row2" class="topic-text">Name</h4>
                            <h3 id="box-row2"><?php echo $pending->FullName; ?></h3>
                            
                        </div>
                        <div style="width:25%;" class="box-column" >
                            <h4 id="box-row2" class="topic-text">Order Total</h4>
                            <h3 id="box-row2">Rs.<?php echo $pending->total; ?></h3>
                        </div>
                        <div style="width:25%;" class="box-column">
                            <h4 id="box-row2" class="topic-text">Status</h4>
                            <h3 id="box-row2"><?php echo $pending->payment_status; ?></h3>
                        </div>     
                    </div>
                <?php endforeach; ?>     
                </div>

    
</div> 
        <?php require APPROOT . '/views/includes/S_bottomPlants.php';?>
        
    </div>
    
    
</div>
<?php require APPROOT . '/views/includes/footer.php';?>
</body>
 