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
        <span class="dashboard">Users - Customer</span>
      </div>
      <button class="buttonadd" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser'">Add user</button>
    </nav>
    <?php include_once APPROOT . '/views/includes/A_users_header.php'; ?> 
      <div class="boxes">
        <div class="userdetails box">
        <?php foreach($data['customers'] as $customer ): ?>

          <div class="user-details">
             
              <ul class="details">
                <li class="topic">Customer Name</li>
                <li><?php echo $customer->FullName; ?></li>
              </ul>
              <ul class="details">
              <li class="topic">Email</li>
              <li><?php echo $customer->Email; ?></li>
            </ul>
            <ul class="details">
              <li class="topic">Address</li>
              <li><?php echo $customer->Line1; ?> <?php echo $customer->Line2; ?> <?php echo $customer->City; ?></li>
            </ul>
            <ul class="details">
              <li class="topic">Contact number</li>
              <li><?php echo $customer->ContactNo; ?></li>
            </ul>
            <ul class="details">
              <li class="topic"></li>
              <li>
        <form action ="<?php echo URLROOT ?>/admins/A_users_updateuser_customer?id=<?php echo $customer->cus_id; ?>" method="POST">   
                 <button type="submit" name="update" class="buttonselection buttonselection1" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_updateuser_customer?id=<?php echo $customer->cus_id; ?>'">Update</button>
        </form>
        <form action="<?php echo URLROOT; ?>/admins/A_DeleteUser" method ="POST">
              <input type="hidden" value="<?php echo $customer->cus_id; ?>" name="deleteId">
              <button class="buttonselection buttonselection2"  >Delete</button>
        </form>
              </li>
            </ul>
          </div>
<?php endforeach ?>
        </div>
      </div>
    </div>
  </section>



</body>
</html>

