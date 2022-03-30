<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Dprofile.css">
    
   
    
</head>
<body>
<?php include_once APPROOT . '/views/includes/header.php'; ?> 
<h1>My Profile</h1>
<div class="signup-content"> 
    <div class="pbox"><img src="<?php echo URLROOT ?>/public/img/profile1.png" style="margin-right:20px;">
    <h4>Hello,</h4> 
    <?php foreach($data['driver'] as $driver ): ?>
    <h3><br><?php echo $driver->fullname ?></h3> </div> 
    <img src="<?php echo URLROOT ?>/public/img/sidepic.png" class="sidepic">
    <div class="profile-form">
    
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    
                                    <input type="text" name="fullname" id="fullname" disabled="disable" placeholder="<?php echo $driver->fullname; ?>"/>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="phoneNo" id="phonenumber" placeholder="<?php echo $driver->phoneNo; ?>" />
                                </div>
                                <div class="form-input">
                                    <textarea id="address" placeholder="<?php echo $driver->address; ?>" style="height:100px;width: 92%;border:1px solid #ebebeb;padding:14px 10px 10px 20px;font-family:'Poppins';font-size:14px;border-radius: 5px" ></textarea>
                                </div>
                           
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <input type="text" name="email" id="email" disabled="disable" placeholder=" <?php echo $driver->email; ?>" />
                                </div>
                                <div class="form-input">
                                    <input type="text" name="vehicel" id="VT" placeholder="<?php echo $driver->vehicel; ?>"/>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="vehicel_number" id="VN" placeholder="<?php echo $driver->vehicel_number; ?>"/>
                                </div>
                                <div class="form-input">
                                    <input type="password" name="current_password" id="CP" placeholder="Current Password"/>
                                    <span style="color:red;">
                                        <?php echo $data['currentPasswordError']; ?>
                                    </span><br>
                                </div>
                                <div class="form-input">
                                    <input type="password" name="new_password" id="NP" placeholder="New Pasword"/>
                                    <span style="color:red;">
                                    <?php echo $data['passwordError']; ?>
                                    </span>
                                </div>
                                <div class="form-input">
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Pasword"/>
                                    <span style="color:red;">
                                    <?php echo $data['confirmPasswordError']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                    </form>
 </div>  
                        
</div>                       

    
</body>

<?php include_once APPROOT . '/views/includes/footer.php'; ?>
</html>