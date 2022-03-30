
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_AddressBook.css"> 

</head>   
    
    <body>
    <?php include_once APPROOT . '/views/includes/header.php'; ?>

    
     <div class="row">
     
     <?php include_once APPROOT . '/views/includes/C_sidenav.php'; ?>
    
    <!--horizontal line-->
    <div class="vl"></div>  
    
    
    <div class="col2"></div>
    
        <div class="profilebox">
    
            <h2 style="padding: 10px 10px 20px 235px">Update Address </h2>
             
             <form action="<?php echo URLROOT; ?>/customers/C_UpdateAddress" method="POST">

                    <div class="container1">
                        <input type="text" placeholder="Full Name" name="fname" value="<?php echo $data['address']->FullName; ?>" required>
                        <span style="color:grey;">
                        <?php echo $data['NameError']; ?>
                        </span>
                        <input type="text" placeholder="Address Line 1" name="line1" value="<?php echo $data['address']->Line1; ?>" required>
                        <span style="color:grey;">
                        <?php echo $data['line1Error']; ?>
                        </span>
                        <input type="text" placeholder="Address Line 2" name="line2" value="<?php echo $data['address']->Line2; ?>" required>
                        <span style="color:grey;">
                        <?php echo $data['line2Error']; ?>
                        </span>
                        <input type="text" placeholder="City" name="City" value="<?php echo $data['address']->City; ?>" required>
                        <span style="color:grey;">
                        <?php echo $data['CityError']; ?>
                        </span>
                        <input type="text" placeholder="Postal Code" name="PostalCode" value="<?php echo $data['address']-> PostalCode; ?>" required>
                        <span style="color:grey;">
                        <?php echo $data['PostalCodeError']; ?>
                        </span>
                        <input type="text" placeholder="Contact No" name="ContactNo" value="<?php echo $data['address']->ContactNo; ?>" required>
                        <span style="color:grey;">
                        <?php echo $data['ContactNoError']; ?>
                        </span><br><br>
                        <button type="submit" class="button1" >Save Changes</button>
                        <button type="reset" class="button2">Cancel</button>
                    </div>
            </form>
    
     
        </div>
    </div>
    </div>

    <?php include_once APPROOT . '/views/includes/footer.php'; ?>
    </body>