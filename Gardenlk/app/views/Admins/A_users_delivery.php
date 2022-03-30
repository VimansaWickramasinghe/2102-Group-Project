<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/A_users.css">

     <style>
      p{
        margin-bottom: 15px;
      }
      img{
        float: left;
        margin-top: 0.5%;
        margin-bottom: 0.5%;
        margin-right: 3%;
        height: 260px;
        width: 300px;
      }
      .row{
          display: flex;
      }
      .column{
        flex: 50%;      
      }
      </style>

   </head>

<body>
<?php include_once APPROOT . '/views/includes/A_sidenav.php'; ?> 
  <section class="home-section">
    <nav>
      <div class="sidebar-topic">
        <span class="dashboard"> Users - Delivery Person</span>
      </div>
      <button class="buttonadd" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser'">Add user</button>
    </nav>
    <?php include_once APPROOT . '/views/includes/A_users_header.php'; ?> 

      <div class="boxes">
      
        <div class="newreq box">
        
          <div>
          <?php foreach($data['drivers'] as $driver ): ?>
            
              <div class="row">
                <div class="column">
                <div><img src="<?php echo URLROOT ?>/public/img/dpimg.jpeg" alt="image"></div>
                    <p>ID: <?php echo "  " . $driver->driver_id; ?> </p>
                    <p>Name: <?php echo "  " . $driver->fullname; ?></p>
                    <p>Address: <?php echo "  " . $driver->address; ?></p>
                    <p>NIC Number: <?php echo "  " . $driver->nic; ?></p>
                    <p>Gender: <?php echo "  " . $driver->gender; ?> </p>
   
                </div>
                <div class="column">
                    <p>Email:<?php echo "  " . $driver->email; ?> </p> 
                    <p>Contact Number: <?php echo "  " . $driver->phoneNo; ?></p>
                    <p>Vehicle Type: <?php echo "  " . $driver->vehicel; ?> </p>
                    <p>Vehicle Number:<?php echo "  " . $driver->vehicel_number; ?> </p>
                    
                  <div>
                      <button class="buttonselection buttonselection2" style="float:right;" onclick="">Delete</button>
                      <button class="buttonselection buttonselection1" style="float:right;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_updateuser_delivery'" >Update</button> 
                  </div>
                </div>
              </div>
              <?php endforeach ?>
          </div>
           
        </div>
        
        </div>
    </div>
  </section>



</body>
</html>

