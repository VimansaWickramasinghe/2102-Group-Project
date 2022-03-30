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
    </nav>

    <div class="home-content">
      <div class="boxes">
        <div class="newreq box">
          <div class="title" style="text-align: center;">Add Moderator</div>
            <div style="margin-top: 30px;">
            <form action="<?php echo URLROOT; ?>/admins/A_users_adduser_moderator" method="POST">
            <label for="email">Email</label>
                    <input type="text" placeholder="Email" class="input-field" name="email"><br>
                    <span style="color:red;">
                    <?php echo $data['emailError']; ?>
                    </span>

                    <label for="password">Password</label>
                    <input type="text" placeholder="Password" class="input-field" name="password"><br>
                    <span style="color:red;">
                    <?php echo $data['passwordError']; ?>
                    </span>

                    <label for="re-password">Confirm Password</label>
                    <input type="text" id="re-password" name="repassword" placeholder="Confirm Password">
                    <span style="color:red;">
                    <?php echo $data['confirmPasswordError']; ?>
                    </span>

                <input type="submit" value="Cancel" style="background-color: crimson;">
                <input type="submit" value="Add">
              </form>
          </div>
        </div>
      </div>
    </div>
  </section>



</body>
</html>

