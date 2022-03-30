<?php
   require APPROOT . '/views/includes/header.php';
   
?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Seller_register.css">
<body>
<div class="container">
    <div class="cont">
        <h1>Sign Up</h1><br>
        <p>Please fill in this form to create an account.</p>
             <form
                id="register-form"
                class="form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/Seller_register"
            >
                
            <input type="text" id="bname" class="input-field"  name="businessName" placeholder="Business Name" value="" onblur="checkAvailability()" minlength="" required /><span></span>
        
            <input type="text" placeholder="Business Registration No " name="brNo" class="input-field">
            <span class="invalidFeedback">
                <?php echo $data['brNoError']; ?>
            </span>

            <input type="text"  class="input-field" name="businessAddress" placeholder="Business Address"  required /><span></span>
            
            <input type="text"  class="input-field" name="city" placeholder="Nearest city"  required /><span></span>

            <input type="text"  class="input-field" name="ownerName" placeholder="Owner Name"   required /><span></span>

            <input type="text"  class="input-field" name="contactNo" placeholder="Contact No"   required /><span></span>

            <input type="email" class="input-field" placeholder="Email " name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>
            <label>Upload the Shop Logo</label>
            <input type="file"  class="input-field" name="shopImg" required /><span></span>

            <input type="password" class="input-field" placeholder="Password " name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" class="input-field" placeholder="Confirm Password " name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>
            <p class="options"><input type="checkbox" required>By creating an account you agree to our <a href="<?php echo URLROOT; ?>/pages/terms">Terms & Privacy</a>.</p>
            <button class="btn" type="submit" value="submit">Register</button>

            <p class="options">Already have an account?  <a href="<?php echo URLROOT; ?>/users/login">Sign in</a></p>
        </form>
    </div>
</div>
