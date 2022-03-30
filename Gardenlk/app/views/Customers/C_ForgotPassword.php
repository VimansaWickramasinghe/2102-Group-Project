<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_ForgotPassword.css"> 

</head>   
    
    <body>
    <?php include_once APPROOT . '/views/includes/header.php'; ?>
    
    <table cellspacing="5" cellpadding="50" align="center">

        <tr>
            <td>
                <div>
                <img src="<?php echo URLROOT ?>/public/img/Forgotpwd.png" class="loginImage" alt="plant pot">   
                </div>
            </td>
            
    
    
        <td >
            <form action="check.php" method="post">
            <div class="container2">
                <br>
                <h1>Forgot Password</h1><br>

                <input type="email" placeholder="Enter Email" name="email" required>
                <a href="registration.php" class="forgotpwd">Create New Account</a>
                <br>
                <button type="submit">Submit</button>
            </div>
            </form>
        </td>
    </table>
    
    <?php include_once APPROOT . '/views/includes/footer.php'; ?>

</body>


</html>