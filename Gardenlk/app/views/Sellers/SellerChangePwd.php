<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_SellerProfile.css">
    
   
    
</head>
<body>
<?php include_once APPROOT . '/views/includes/header.php'; ?> 
<h1>My Profile</h1>
<div class="signup-content"> 
    <div class="pbox"><img src="<?php echo URLROOT ?>/public/img/profile1.png" style="margin-right:20px;">
    <h4>Hello,</h4> 
    <h3><br>Vimansa Wickramasinghe</h3> </div> 
    <img src="<?php echo URLROOT ?>/public/img/sellerprofile.png" class="sidepic">
    <div class="profile-form">
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-row">
                            <!-- <div class="form-group">
                                <div class="form-input">
                                    
                                    <input type="text" name="Bname" id="Bname" placeholder="Business Name" />
                                </div>
                                <div class="form-input">
                                    <input type="text" name="ContactNo" id="ContactNo" placeholder="Business Contact No" />
                                </div>
                                <div class="form-input">
                                    <textarea id="address" placeholder="Address" style="height:100px;width: 92%;border:1px solid #ebebeb;padding:14px 10px 10px 20px;font-family:'Poppins';font-size:14px;border-radius: 5px" ></textarea>
                                </div>
                           
                            </div> -->
                            <div class="form-group">
                            <!-- <div class="form-input">
                                    <input type="text" name="ownername" id="ownername" placeholder="Owner Name" />
                                </div>
                                <div class="form-input">
                                    <input type="text" name="Owner Contact No" id="OwnerContactNo" placeholder="Owner Contact No"/>
                                </div> -->
                                <div class="form-input">
                                    <input type="text" name="CP" id="CP" placeholder="Current Password"/>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="NP" id="NP" placeholder="New Pasword"/>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="PSWD" id="PSWD" placeholder="Confirm Pasword"/>
                                </div>
                            </div>
                        </div>
                        
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