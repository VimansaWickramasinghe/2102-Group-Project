<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/A_users.css">
 
   </head>

<body>
<?php include_once APPROOT . '/views/includes/A_sidenav.php'; ?> 
  <section class="home-section">
    <nav>
      <div class="sidebar-topic">
        <span class="dashboard">Manage Users - Add User</span>
      </div>
      <button class="buttonadd" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser'">Add user</button>
    </nav>

    <div class="home-content">
      <div class="boxes">
        <div class="userdetails box">
          <div class="title" style="font-size: 30px;">Select User Role to Add</div>

          <div class="overview-boxes" style="margin-top: 30px;">

            <button class="box button" style="background-color: rgb(18, 233, 29); width: 49%; margin-bottom: 20px;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser_customer'">      
              <div class="right-side">
                <div class="box-topic" style="font-size: 35px;">Customer</div>
              </div>    
            </button>
          
            <button class="box button" style="background-color: rgb(18, 233, 29); width: 49%; margin-bottom: 20px;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser_seller'">
              <div class="right-side">
                <div class="box-topic" style="font-size: 35px;">Seller</div>
              </div>
            </button>
    
            <button class="box button" style="background-color: rgb(18, 233, 29); width: 49%; margin-bottom: 20px;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser_delivery'">
              <div class="right-side">
                <div class="box-topic" style="font-size: 35px;">Delivery Person</div>
              </div>
            </button>
    
            <button class="box button" style="background-color: rgb(18, 233, 29); width: 49%; margin-bottom: 20px;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser_moderator'">
              <div class="right-side">
                <div class="box-topic" style="font-size: 35px;">Moderator</div>
              </div>
            </button>
    
            <button class="box button" style="background-color: rgb(18, 233, 29); width: 49%; margin-bottom: 20px;" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser_admin'">
              <div class="right-side">
                <div class="box-topic" style="font-size: 35px;">Admin</div>  
              </div>
            </button>
          </div>
          

        </div>
      </div>
    </div>
  </section>



</body>
</html>

