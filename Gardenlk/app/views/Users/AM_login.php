<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/AM_login.css">
    <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/AM_login.js"></script>
<head>
    <body>
    
    <div class="container">

       
        <div class="box-1">
            <div class="content-holder">
                <!-- <h2>Garden.lk</h2> -->
                <img src="<?php echo URLROOT ?>/public/img/LOGO.png" alt="" style="width: 300px;"class="center" >   
                <p>we are here for help you .</p>
                <button class="button-1" onclick="login1()" >Login As Moderator</button>
                <button class="button-2" onclick="login2()" >Login As Admin</button>
            </div>
        </div>
<!-- login as admin -->
<div class="box-2">
            <div class="login1-form-container">
                <h1>Login As Admin</h1>
                <form action="<?php echo URLROOT; ?>/users/Admin_login" method="post">

                    <input type="text" placeholder="Email" class="input-field" name="email"><br>
                    <span style="color:red;">
                    <?php echo $data['emailError']; ?>
                    </span>
                    <br>

                    <input type="password" placeholder="Password" class="input-field" name="password"><br>
                    <span style="color:red;">
                    <?php echo $data['passwordError']; ?>
                    </span>
                    <br><br>

<!--                     <a href="" class="forgotpwd">Forgot Password?</a>
 -->                    <br>
                    <button class="login-button" type="submit">Login</button>

                </form>
            </div>


<!-- login as moderator -->
        <div class="login2-form-container">
            <h1>Login As Moderator</h1>
            <form action="<?php echo URLROOT; ?>/users/Moderator_login" method="post">
            <input type="text" placeholder="Email" class="input-field" name="email"><br>
            <span style="color:red;">
                    <?php echo $data['emailError']; ?>
            </span>
            <br>
            <input type="password" placeholder="Password" class="input-field" name="password"><br>
            <span style="color:red;">
                    <?php echo $data['passwordError']; ?>
            </span>
            <br><br>
<!--                 <a href="" class="forgotpwd">Forgot Password?</a>
 -->            <br>
                <button class="login-button" type="submit">Login</button>
            </form>
        </div>




</body>
    </html>