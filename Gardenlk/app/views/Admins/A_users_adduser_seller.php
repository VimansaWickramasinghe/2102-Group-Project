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
          <div class="title" style="text-align: center;">Add Seller</div>
            <div style="margin-top: 30px;">
            <form action="<?php echo URLROOT; ?>/admins/A_users_adduser_seller" method="POST">
            
                <label for="bname">Business Name</label>    
                <input type="text" id="bname" class="input-field"  name="businessName" placeholder="Business Name" value="" onblur="checkAvailability()" minlength="" required /><span></span>
        
                <label for="brNo">Business Registration No</label>    
                <input type="text" placeholder="Business Registration No " name="brNo" class="input-field">
                <span class="invalidFeedback">
                    <?php echo $data['brNoError']; ?>
                </span>

                <label for="businessAddress">Business Address</label>
                <input type="text"  class="input-field" name="businessAddress" placeholder="Business Address"  required /><span></span>
                
                <label for="city">Nearest city</label>
                <input type="text"  class="input-field" name="city" placeholder="Nearest city"  required /><span></span>

                <label for="ownerName">Owner Name</label>
                <input type="text"  class="input-field" name="ownerName" placeholder="Owner Name"   required /><span></span>

                <label for="contactNo">Contact No</label>
                <input type="text"  class="input-field" name="contactNo" placeholder="Contact No"   required /><span></span>

                <label for="email">Email</label>
                <input type="text" class="input-field" placeholder="Email " name="email" required>
                <span class="invalidFeedback">
                    <?php echo $data['emailError']; ?>
                </span>
                <br>
                <br>
                <label>Upload the Shop Logo</label>
                <input type="file"  class="input-field" name="shopImg" required /><span></span>
                <br>
                <br>
                <label for="password">Password</label>
                <input type="text" class="input-field" placeholder="Password " name="password" required>
                <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>

                <label for="confirmPassword">Confirm Password</label>
                <input type="text" class="input-field" placeholder="Confirm Password " name="confirmPassword" >
                <span class="invalidFeedback">
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

