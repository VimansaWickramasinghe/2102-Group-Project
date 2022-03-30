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
        <span class="dashboard"> Users - Moderator</span>
      </div>
      <button class="buttonadd" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_adduser'">Add user</button>
    </nav>
    <?php include_once APPROOT . '/views/includes/A_users_header.php'; ?> 

      <div class="boxes">
        <div class="userdetails box">
        <?php foreach($data['moderators'] as $mod ): ?>
          <div class="user-details">
            <ul class="details">
                <li class="topic">ID</li>
                <li><?php echo $mod->id; ?></li>
              </ul>
              <ul class="details">
                <li class="topic">Moderator Name</li>
                <li><?php echo $mod->name; ?></li>
              </ul>
              <ul class="details">
              <li class="topic">Email</li>
              <li><?php echo $mod->email; ?></li>
            </ul>
            
            <ul class="details">
              <li class="topic">Contact number</li>
              <li><?php echo $mod->contactNo; ?></li>
            </ul>
            <ul class="details">
              <li class="topic"></li>
              <li>
                <button class="buttonselection buttonselection1" onclick="document.location='<?php echo URLROOT ?>/admins/A_users_updateuser_moderator'">Update</button>
                <button class="buttonselection buttonselection2">Delete</button>
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

