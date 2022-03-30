<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Moderator.css">  
  </head>

<body>
<?php include_once APPROOT . '/views/includes/M_sidenav.php'; ?> 
  <section class="home-section">
    <nav>
      <div class="sidebar-topic">
        <span class="dashboard">Plants to be Reviewed</span>
      </div>
    </nav>

    <div class="home-content">
      <?php foreach($data['plants'] as $plant ): ?>
      <form action="<?php echo URLROOT; ?>/Moderators/M_review_plant" method="POST">
      <div class="boxes">
        <div class="newreq box">
          <div>
            <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $plant->img1; ?>" alt="plantImage"></div>
              <div class="row">
                <div class="column">
                <input type="hidden" name="plantid" value="<?php echo $plant->plant_id; ?>">
                    <p>Plant Name: <?php echo $plant->pname; ?></p>
                    <p>Plant Type: <?php echo $plant->category; ?></p>
                    <p>Plant Price: <?php echo $plant->price; ?></p>
                    <p>Shop Name: <?php echo $plant->businessName; ?></p>
                    <p>Description: <?php echo $plant->description; ?></p>
                </div>
                <div class="column">   
                  <div>
                      <button type="submit" class="buttonselection buttonselection1" >Add</button>
      </form>
                      <form action = "<?php echo URLROOT; ?>/Moderators/M_rejectPlant" method="POST">
                        <input type="hidden" name="plantId" value="<?php echo $plant->plant_id; ?>">
                        <button type="submit" class="buttonselection buttonselection2">Reject</button>
                      </form>
                  </div>
                </div>
              </div>  
          </div>
        </div>
      </div><br>
      </form>
      <?php endforeach; ?>
    
      
    </div>
  </section>



</body>
</html>

