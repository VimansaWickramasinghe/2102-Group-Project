<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login.css"> 

</head>
<body>
<?php include_once APPROOT . '/views/includes/header.php'; ?> 

<body>
    
    <table cellspacing="5" cellpadding="50" align="center">

        <tr>
            <td>
                <div>
                <img src="<?php echo URLROOT ?>/public/img/login.png" class="loginImage" alt="plant pot">   
                </div>
            </td>
            <td>
             
            <div class="container1">
            <br>
            <h1>New member?</h1>
            <a href="<?php echo URLROOT; ?>/Users/Customer_register"> <button class="usertype" type="customer"><img src="<?php echo URLROOT ?>/public/img/customer.png" width="28px" height="28px">&nbsp   Customer</button></a>
            <a href="<?php echo URLROOT; ?>/Users/seller_reg"><button class="usertype" type="seller"><img src="<?php echo URLROOT ?>/public/img/seller.png" width="28px" height="28px">&nbsp &nbsp Seller</button></a>
            <a href="<?php echo URLROOT; ?>/Users/Dregister"><button class="usertype" type="driver"><img src="<?php echo URLROOT ?>/public/img/driver.png" width="28px" height="28px">&nbsp &nbsp Driver</button></a>


        </div>
        </td>
    
    
    <td>
    <form action="<?php echo URLROOT; ?>/users/Seller_login" method="post">
        <div class="container2">
            <br>
            <h1>LogIn</h1>

            <input type="email" placeholder="Enter Email" name="email" required>
            <span style="color:red;">
                <?php echo $data['emailError']; ?>
            </span>


            
            <input type="password" placeholder="Enter Password" name="pwd" required>
            <span style="color:red;">
                <?php echo $data['passwordError']; ?>
            </span>


<!--             <a href="" class="forgotpwd">Forgot Password?</a>
 -->            <br>
            <button type="submit">Login</button>
        </div>
    </form>
    </td>
</table>
    <?php include_once APPROOT . '/views/includes/footer.php'; ?>
</body>


</html>