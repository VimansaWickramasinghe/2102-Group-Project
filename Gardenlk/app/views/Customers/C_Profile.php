<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_Profile.css"> 

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
        <?php foreach($data['customer'] as $customer ): ?>
        <form action="<?php echo URLROOT; ?>/customers/C_Profile" method="post">
                <div class="container1">
                    <input type="text" placeholder="District" name="district">
                    <input type="text" placeholder="Full Name" name="fname" value="<?php echo $customer->FullName ?>" required>
                    <input type="email" name="email" disabled="disable" value="<?php echo $customer->Email?>"required><br><br>
                     <div></div>
<!--                     <div class="pwdBtn"><a href="<?php echo URLROOT ?>/Customers/C_ChangePassword">Change Password</a></div><br><br>
 -->                    <button type="submit" class="button1" >Save Changes</button>
                    <button type="reset" class="button2">Cancel</button>
                </div>
        </form>
<?php endforeach ?>

    </div>
</div>
</div>
   
<?php include_once APPROOT . '/views/includes/footer.php'; ?>

</body>
