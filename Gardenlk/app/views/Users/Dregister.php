<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Dsignup.css"> 

</head>
<body>
<?php include_once APPROOT . '/views/includes/header.php'; ?> 

<body>

    <div class="main">

        <section class="signup">
           
            <div class="container">
                <div class="signup-content">
                    <form method="POST"  class="signup-form" action="<?php echo URLROOT; ?>/users/Dregister" >
                        <h1 class="form-title">Registration</h1>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" placeholder="Full Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="number" placeholder="Phone Number" required/>
                        </div>
                        <div class="form-group">
                            
                            <textarea id="address" name="address" placeholder="Address" style="height:100px;width: 100%;"></textarea>
                        </div> 
                        <div class="form-group">
                            <input type="text" class="form-input" name="nic" placeholder="NIC" required/>
                        </div>
                        <div class="form-group">
                        <select id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div> 
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Your Email" required/>
                            <span class="InvalidFeedback"><?php echo $data['emailError']; ?></span>
                        </div>
                       
                        <div class="form-group">
                        <select id="vehicle" name="vehicle">
                            <option value="Motor Bike">Motor Bike</option>
                            <option value="Three Wheeler">Three Wheeler</option>
                            <option value="Car">Car</option>
                            <option value="Van">Van</option>
                            <option value="Truck">Truck</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="vnumber" placeholder="Vehicle Number" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" placeholder="Password" required/>
                            <span class="invalidFeedback"><?php echo $data['passwordError']; ?></span>
            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="confirmPassword" placeholder="Repeat your password"/>
                            <span class="invalidFeedback"><?php echo $data['confirmPasswordError']; ?></span>
                        </div>
                        <label for="agree-term" class="label-agree-term">
                        <input type="checkbox" checked="checked" name="sameadr" required> <span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        <div class="AR">
                        <button type="submit" class="signup1" name="regSubmit" id="submit" value="submit">Submit</button>
                        <button type="button" class="cancelbtn"><a href="<?php echo URLROOT; ?>/users/login">Cancel</a></button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </section>

    </div>

    
    <?php include_once APPROOT . '/views/includes/footer.php'; ?>
</body>


</html>