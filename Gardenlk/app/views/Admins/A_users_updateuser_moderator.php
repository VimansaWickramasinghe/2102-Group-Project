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
        <span class="dashboard">Manage Users - Update User</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="boxes">
        <div class="newreq box">
          <div class="title" style="text-align: center;">Update Moderator</div>
            <div style="margin-top: 30px;">
            <form action="<?php echo URLROOT; ?>/admins/A_users_updateuser_moderator" method="POST">
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fname" placeholder="Full Name">
          
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
          
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Address">

                <label for="cnumber">Contact Number</label>
                <input type="text" id="cnumber" name="cnumber" placeholder="Contact Number">
            
                <input type="submit" value="Cancel" style="background-color: crimson;">
                <input type="submit" value="Update">
              </form>
          </div>
        </div>
      </div>
    </div>
  </section>



</body>
</html>

