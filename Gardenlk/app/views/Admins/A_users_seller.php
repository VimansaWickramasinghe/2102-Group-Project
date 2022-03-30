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
        <span class="dashboard"> Users - Seller</span>
      </div>
      <button class="buttonadd" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser'">Add user</button>
    </nav>
    <?php include_once APPROOT . '/views/includes/A_users_header.php'; ?> 

      <div class="boxes">
        <div class="newreq box">
          <div>
          <?php foreach($data['sellers'] as $seller ): ?>
              <div class="row">
                <div class="column">
                    <p>ID & logo: <?php echo $seller->seller_id; ?><img src="<?php echo URLROOT ?>/public/img/<?php echo $seller->shopimg; ?>" height="50px" width="50px"> </p>
                    <p>Seller Name: <?php echo $seller->ownerName; ?> </p>
                    <p>Email: <?php echo $seller->email; ?> </p>
                    <p>Contact Number: <?php echo $seller->contactNo; ?></p>    
                </div>
                <div class="column">
                    <p>Business Name:<?php echo $seller->businessName; ?> </p>
                    <p>Address: <?php echo $seller->businessAddress; ?> </p>
                    <p>BR Number: <?php echo $seller->brNo; ?> </p>
                    <p>Nearest City:<?php echo $seller->city; ?> </p>
                  <div>
                      <button class="buttonselection buttonselection2" style="float:right;" onclick="">Delete</button>
                      <button class="buttonselection buttonselection1" style="float:right;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_updateuser_seller'" >Update</button> 
                  </div>
                </div>
              </div> 
              <?php endforeach?> 
          </div>
        </div>
      </div>
    </div>
  </section>



</body>
</html>

