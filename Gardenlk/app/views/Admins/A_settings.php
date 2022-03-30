<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/A_settings.css">
  </head>

<body>
<?php include_once APPROOT . '/views/includes/A_sidenav.php'; ?> 
  <section class="home-section">
    <nav>
      <div class="sidebar-topic">
        <span class="dashboard">Settings</span>
      </div>
    </nav>

    <div class="home-content">
      <!-- <div class="boxes">
        <div class="newreq box">
          
          <div class="title">Profile</div>
            <div style="margin-top: 20px;">
            <form action="<?php echo URLROOT; ?>/admins/A_settings" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
              
                <input type="submit" value="Cancel" style="background-color: crimson;">
                <input type="submit" value="Save Changes">
              </form>
          </div>
        </div>
      </div> -->

      <div class="boxes" style="margin-top: 20px;">
        <div class="newreq box">
          <div class="title">Change password</div>
            <div style="margin-top: 20px;">
            <form action="<?php echo URLROOT; ?>/admins/A_settings" method="POST">
                <label for="cpass">Current password</label>
                <input type="text" id="cpass" name="cpassword" placeholder="Current password">
                <span style="color:red;">
                <?php echo $data['currentPasswordError']; ?>
                </span><br>
          
                <label for="npass">New password</label>
                <input type="text" id="npass" name="npassword" placeholder="New password">
                <span style="color:red;">
                <?php echo $data['passwordError']; ?>
                </span>
          
                <label for="cnpass">Confirm new password</label>
                <input type="text" id="cnpass" name="cnpassword" placeholder="Confirm new password">
                <span style="color:red;">
                <?php echo $data['confirmPasswordError']; ?>
                </span>
                
                <input type="submit" value="Cancel" style="background-color: crimson;">
                <input type="submit" value="Change password">
              </form>
          </div>
        </div>
      </div>
    </div>
  </section>



</body>
</html>

