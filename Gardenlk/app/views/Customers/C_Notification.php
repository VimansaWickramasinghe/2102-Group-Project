<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo SITENAME; ?></title>

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_Notification.css">

</head>

<body>
   <?php include_once APPROOT . '/views/includes/header.php'; ?>

   <div class="row">

      <?php include_once APPROOT . '/views/includes/C_sidenav.php'; ?>




      <div class="col2">

         <div class="topic">
            <h2>Notifications</h2>
         </div>

         <br>

         <div>
            <!--Notification Card 1-->
            <table class="table1">
               <tr>
                  <td rowspan="3" style="text-align:justify"><img src="<?php echo URLROOT ?>/public/img/shop3.jpg" width="60px" height="60px;"></td>
                  <td><b>Cactus Shop</b></td>
                  <td></td>
                  <td style="text-align:right">2021/09/20</td>
               </tr>
               <tr>
                  <td colspan="3">Here comes the message<br>Here comes the message</td>

               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="dltButton">Delete</button> <button type="button" class="dltButton">View</button></td>
               </tr>
            </table>
         </div><br>






         <div>
            <!--Notification Card 2-->
            <table class="table1">
               <tr>
                  <td rowspan="3"><img src="<?php echo URLROOT ?>/public/img/shop1.png" width="60px" height="60px;"></td>
                  <td><b>Garden Center</b></td>
                  <td></td>
                  <td style="text-align:right">2021/09/20</td>
               </tr>
               <tr>
                  <td colspan="3">Here comes the message<br>Here comes the message</td>

               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="dltButton">Delete</button> <button type="button" class="dltButton">View</button></td>
               </tr>
            </table>
         </div><br>






         <div>
            <!--Notification Card 3-->
            <table class="table1">
               <tr>
                  <td rowspan="3"><img src="<?php echo URLROOT ?>/public/img/shop2.png" width="60px" height="60px;"></td>
                  <td><b>Bassett's</b></td>
                  <td></td>
                  <td style="text-align:right">2021/09/20</td>
               </tr>
               <tr>
                  <td colspan="3">Here comes the message<br>Here comes the message</td>

               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="dltButton">Delete</button> <button type="button" class="dltButton">View</button></td>
               </tr>
            </table>
         </div><br>



      </div>
   </div>



</body>

</html>