<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/A_dp_request.css">
   
     

   </head>

<body>
<?php include_once APPROOT . '/views/includes/A_sidenav.php'; ?> 
  <section class="home-section">
    <nav>
      <div class="sidebar-topic">
        <span class="dashboard">Delivery person requests</span>
      </div>
    </nav>

    <div class="home-content">

  
    <?php foreach($data['drivers'] as $driver ): ?>
      <form action="<?php echo URLROOT; ?>/Admins/A_dp_request" method="POST">
      <div class="boxes">
        <div class="newreq box">
          <div>
            <div><!-- <img src="<?php echo URLROOT ?>/public/img/dpimg.jpeg" alt="image"> --></div>
              <div class="row">
                <div class="column">
                <input type="hidden" name="driverId" value="<?php echo $driver->driver_id; ?>">
                    <p><b>Name:</b> <?php echo $driver->fullname; ?></p>
                    <p><b>Address:</b> <?php echo $driver->address; ?></p>
                    <p><b>NIC Number:</b> <?php echo $driver->nic; ?></p>
                    <p><b>Gender:</b> <?php echo $driver->gender; ?></p>
                        
                </div>
                <div class="column">
                    <p><b>Email:</b> <?php echo $driver->email; ?></p>
                    <p><b>Contact Number:</b> <?php echo $driver->phoneNo; ?></p>
                    <p><b>Vehicle Type:</b> <?php echo $driver->vehicel; ?></p>
                    <p><b>Vehicle Number:</b> <?php echo $driver->vehicel_number; ?></p>
                  <div>
                      <button type="submit" class="buttonselection buttonselection1">Add</button>
                      </form>
                      <form action="<?php echo URLROOT; ?>/Admins/A_dp_requestCancelled" method="POST">
                      <input type="hidden" name="driverId" value="<?php echo $driver->driver_id; ?>">
                      <button type="submit" class="buttonselection buttonselection2">Delete</button>
                    </form>

                  </div>
                </div>
              </div>  
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>



  </section>



</body>
</html>

