
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_ChangePassword.css"> 

</head>   
    
    <body>
    <?php include_once APPROOT . '/views/includes/header.php'; ?>

    <div class="plantImage"><img src="<?php echo URLROOT ?>/public/img/profileplant.png" width="271px" height="329px"></div>
    <div class="row">
     
    <?php include_once APPROOT . '/views/includes/C_sidenav.php'; ?>
    
    <!--horizontal line-->
    <div class="vl"></div>  
    
    
    <div class="col2"></div>
    
        <div class="profilebox">
    
            <h2 style="padding: 10px 10px 20px 235px">My Profile</h2>
    
            <form action="<?php echo URLROOT; ?>/customers/C_ChangePassword" method="post">
                    <div class="container1">
                        
                        <input type="password" placeholder="Current Password" name="cpassword" required><br>
                        <span style="color:red;">
                        <?php echo $data['currentPasswordError']; ?>
                        </span><br>
          
                        <input type="password" placeholder="New Password" name="npassword" required><br>
                        <span style="color:red;">
                        <?php echo $data['passwordError']; ?>
                        </span><br>

                        <input type="password" placeholder="Confirm Password" name="cnpassword" required><br><br>
                        <span style="color:red;">
                        <?php echo $data['confirmPasswordError']; ?>
                        </span><br><br><br>

                        <button type="submit" class="button1" >Save Changes</button>
                        <button type="reset" class="button2">Cancel</button>
                    </div>
            </form>
    
    
        </div>
    </div>
    </div>
    <br>   
    <?php include_once APPROOT . '/views/includes/footer.php'; ?>

    </body>