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
          <div class="title" style="text-align: center;">Add Delivery Person</div>
            <div style="margin-top: 30px;">
            <form action="<?php echo URLROOT; ?>/admins/A_users_adduser_delivery" method="POST">

                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fname" placeholder="Full Name">
          
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
                <span style="color:red;">
                <?php echo $data['emailError']; ?>
                </span>


                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Address" style="height:100px;width:100%; border-color:#ccc;"></textarea>

                <label for="nnumber">NIC Number</label>
                <input type="text" id="nnumber" name="nnumber" placeholder="NIC Number">

                <label for="gender">Gender</label>
                <select id="gender" name="gender" placeholder="Gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>

                <label for="vtype">Vehicle Type</label>
                <select id="vtype" name="vtype" placeholder="Vehicle Type">
                  <option value="Motor Bike">Motor Bike</option>
                  <option value="Three Wheeler">Three Wheeler</option>
                  <option value="Car">Car</option>
                  <option value="Van">Van</option>
                  <option value="Truck">Truck</option> 
                </select>

                <label for="vtype">Vehicle Number</label>
                <input type="text" id="vnumber" name="vnumber" placeholder="Vehicle Type">

                <label for="cnumber">Contact Number</label>
                <input type="text" id="cnumber" name="cnumber" placeholder="Contact Number">

                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Password">
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

