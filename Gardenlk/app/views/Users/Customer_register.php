<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Customer_register.css"> 

</head>
<body>

<?php include_once APPROOT . '/views/includes/header.php'; ?> 

    <table cellspacing="5" cellpadding="50" align="center">
        <tr>
            <td>
    <form action="<?php echo URLROOT; ?>/users/Customer_register" method="post">
        <div class="container3">
            <br>
            <h1>SignUp</h1>

            <input type="text" placeholder="Full Name" name="username" required>
            <span style="color:red;">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="text" placeholder="Email Address" name="email" required>
            <span style="color:red;">
                <?php echo $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Password" name="password" required>
            <span style="color:red;">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password" name="confirmPassword" required><br><br>
            <span style="color:red;">
                <?php echo $data['confirmPasswordError']; ?>
            </span><br>

            <input type="checkbox" required>
            <label for="TermsAndConditions" class="p2">I Read And Agree To <a href="#" style="text-decoration:none; color: black;">Terms & Conditions</a></label><br>
            
            <button type="submit">Register</button>
        </div>
    </form></td>
    <td>
        <div>
        <img src="<?php echo URLROOT ?>/public/img/registration.png" class="RegImage" alt="plant pot">   
        </div>
    </td>
    </table>
    
</body>
</html>