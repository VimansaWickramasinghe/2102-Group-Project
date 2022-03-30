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
        <span class="dashboard">Plants</span>
      </div>
    </nav>

    <div class="home-content">
    <?php foreach($data['plants'] as $plant ): ?>
      <div class="boxes">
        <div class="newreq box">
          <div>
            <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $plant->img1; ?>" alt="Cactus"></div>
              <div class="row">
                <div class="column">
                    <p>Plant Name: <?php echo $plant->pname; ?></p>
                    <p>Plant Type: <?php echo $plant->category; ?> Plant</p>
                    <p>Plant Price: <?php echo $plant->price; ?></p>
                    <p>Shop Name: <?php echo $plant->businessName; ?></p>
                     
                </div>
                <div class="column">
                    <p>Description: <?php echo $plant->description; ?></p>
                </div>
              </div>  
          </div>
        </div>
      </div>

    <?php endforeach ?>
    </div>
  </section>



</body>
</html>

