<?php require APPROOT . '/views/includes/header.php';?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_dashboard.css">

<body>
<div class="container">

<?php require APPROOT . '/views/includes/S_sidenav.php';?>

    <div class="column-right">
    <?php require APPROOT . '/views/includes/S_topnav.php';?>
<br>
        
        <div class="frame1">
        <div id="ex1">
                <?php foreach($data['orders'] as $plants ) : ?> 
                    <div class="box">
                        <div style="width:25%;" class="box-column">
                        <img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" style="width:60px; height:60px; margin:10px 0px 0 20px;">
                        </div>            
                        <div style="width:25%;" class="box-column" >
                            <h3 id="box-row2" class="topic-text"><?php echo $plants->pname; ?></h3>    
                        </div>
                        <div style="width:30%;" class="box-column" >                            
                            <h3 id="box-row2"><?php echo $plants->NoOfPlants; ?></h3>
                        </div>
                        <div style="width:20%;" class="box-column">                            
                            <h3 id="box-row2">Rs.<?php echo $plants->price; ?></h3>
                        </div>     
                    </div> 
                    <?php endforeach?> 
                </div>   
        </div>  
        <?php require APPROOT . '/views/includes/S_bottomPlants.php';?>
    
    </div>
        
</div>
<?php require APPROOT . '/views/includes/footer.php';?>
</body>
 