<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_AddAddress.css"> 

</head>   
   
    <body>
    <?php include_once APPROOT . '/views/includes/header.php'; ?> 
    
     <div class="row">
     <?php include_once APPROOT . '/views/includes/C_sidenav.php'; ?>
         
    
    <!--horizontal line-->
    <div class="vl"></div>  
    
    
    <div class="col2">
        
        <div class="topic"><h2>Address Book</h2></div>

        <?php if(isLoggedIn()): ?>

        <a href="<?php echo URLROOT ?>/Customers/C_AddressBook">
        <div class="Addbutton">+ Add New Address</div>
        </a>
        <?php elseif(!isLoggedIn()): ?>
        <a href="<?php echo URLROOT; ?>/users/login">
        <div class="Addbutton">+ Add New Address</div>
        </a>
        <?php endif; ?>

        <br>
        <div>Saved Addresses</div> <br>

        <?php foreach($data['address'] as $address): ?>
            

        <div class="addressCard"><!--Address Card 1--> 
            <table class="table1">
            <tr>
                <th style="text-align:left"><?php echo $address->FullName; ?></th>
                <th style="text-align:right">
            
            
                        <a href="<?php echo URLROOT; ?>/customers/C_UpdateAddress?addressid=<?php echo $address->id; ?>"><img src="<?php echo URLROOT ?>/public/img/pen.png" width="20px" height="20px"></a>
                    
                
                </th>
            </tr>
            <tr>
                <td><?php echo $address->Line1; ?></td>
                <td  style="text-align:right"><!-- <button type="button" class="dltButton"><img src="<?php echo URLROOT ?>/public/img/delete.png" width="20px" height="20px"></button> --></td>
            </tr>
            <tr>
                <td><?php echo $address->Line2; ?></td>
            </tr>
            <tr>
                <td><?php echo $address->City; ?></td>
            </tr>
            <tr>
                <td><?php echo $address->PostalCode; ?></td>
                <td style="text-align:right"><?php echo $address->ContactNo; ?></td>
            </tr>
            </table>   
        </div><br>

    <?php endforeach; ?>
         
 
    </div>
    </div>
    <br>
  
    <div><?php include_once APPROOT . '/views/includes/footer.php'; ?></div>
</body>
</html>