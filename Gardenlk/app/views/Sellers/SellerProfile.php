 
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
<h1>Profile</h1>
<div class="signup-content"> 
    <div class="pbox"><img style="margin-right:20px; border-radius:50%;" src="<?php echo URLROOT ?>/public/img/<?php echo $_SESSION['shopimg'] ?>">
    <h4>Hello,</h4> 
    <h3><br><?php echo $_SESSION['seller_name'] ?></h3> </div> 
    <img src="<?php echo URLROOT ?>/public/img/sellerprofile.png" class="sidepic">
    
    <div class="profile-form">
                    <form action="<?php echo URLROOT; ?>/sellers/SellerProfile" method="POST" class="register-form" id="register-form">
                    <?php foreach($data['sellerDetails'] as $sellerDetails): ?> 
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                
                                    <input type="text" name="Bname" id="Bname" placeholder="" value="<?php echo $sellerDetails->businessName ?>"/>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="ContactNo" id="ContactNo" value="<?php echo $sellerDetails->contactNo ?>" />
                                </div>
                                <div class="form-input">
                                    <textarea id="address" name="address" value ="<?php echo $sellerDetails->businessAddress ?>" style="height:100px;width: 92%;border:1px solid #ebebeb;padding:14px 10px 10px 20px;font-family: 'Poppins', sans-serif;font-size:15px;border-radius: 5px" ></textarea>
                                </div>
                           
                            </div>
                            <div class="form-group">
                            <div class="form-input">
                                    <input type="text" name="ownername" id="ownername" value="<?php echo $sellerDetails->ownerName ?>" />
                                </div>
                                <div class="form-input">
                                    <input type="text" name="email" id="email" value="<?php echo $sellerDetails->email ?>" disabled="disable"/>
                                </div>
                                <div class="form-input">
                                <div class="pwdBtn"><a href="<?php echo URLROOT ?>/Sellers/SellerChangePwd/">Change Password</a></div><br><br>

                                     
                                </div>
                                 
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                        <?php endforeach; ?>
                    </form>
</div>  
                        
</div>                       

    
</body>

<?php include_once APPROOT . '/views/includes/footer.php'; ?>
</html>