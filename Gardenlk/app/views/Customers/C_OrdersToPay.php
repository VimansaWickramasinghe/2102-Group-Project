
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_Orders.css"> 

</head>   
   
    <body>
    <?php include_once APPROOT . '/views/includes/header.php'; ?>
    <body>
    
     <div class="row">
     
     <?php include_once APPROOT . '/views/includes/C_sidenav.php'; ?>
    
    <!--horizontal line-->
    <div class="vl"></div>  
    
    
    <div class="col2">
        <h2>My Orders - To Pay</h2>
        <div class="topnav">
            <a href="<?php echo URLROOT ?>/Customers/C_OrdersToPay">To Pay</a>
            <a href="<?php echo URLROOT ?>/Customers/C_OrdersToReceive">To Receive</a>
             
        </div>
            <br>
            
        <div>

            <table class="orders-table">
                <tr class="orders-table-head">
                    <td colspan="2">OrderNo - #344565</td>
                    <td></td>
                    <td></td>
                    <td colspan="2">Placed On 2021.10.25</td>
                </tr>
                <!-- <tr class="orders-table-head">
                    <td colspan="2">Placed On - 2021.10.25</td>
                    <td></td>
                    <td></td>
                </tr> -->
                
                <tr>
                    <td><img src="<?php echo URLROOT ?>/public/img/p3.jpg" class="imgplant"/></td>
                    <td style="text-align:left;">Here comes a description about the plant with color and size. Also you can mention the selling items like pots including or not</td>
                    <td style=" color:grey;">Qty: 1</td>
                    <td>Estimated arrival:2021.10.30</td>
                    <td>Rs.800.00</td> 
                </tr>
                <tr>
                    <td><img src="<?php echo URLROOT ?>/public/img/p7.jpg" class="imgplant"/></td>
                    <td style="text-align:left;">Here comes a description about the plant with color and size. Also you can mention the selling items like pots including or not</td>
                    <td style="color:grey;">Qty: 1</td>
                    <td>Estimated arrival:2021.10.30</td>
                    <td>Rs.800.00</td>  
                </tr>
            </table> 

        </div><br>


















<!-- 
        <div class="notify" style="height:40px;">
            <table class="table1">
            <tr>
                <th style="text-align:left">Order Number</th>
                <th style="text-align:left">Date</th>
                <th style="text-align:left">Bill Amount</th>
                <th style="text-align:left">Product Name</th>
                <th style="text-align:left">Shop Name</th>
                

            </tr>
            <tr>
                <td>345674</td>
                <td>23 Aug 2021</td>
                <td>120.00</td>
                <td>Xsora Flower</td>
                <td>PlantMe</td>
            </tr>
            </table>   
        </div><br>

        <div class="notify" style="height:40px;">
            <table class="table1">
            <tr>
                <th style="text-align:left">Order Number</th>
                <th style="text-align:left">Date</th>
                <th style="text-align:left">Bill Amount</th>
                <th style="text-align:left">Product Name</th>
                <th style="text-align:left">Shop Name</th>
                

            </tr>
            <tr>
                <td>345674</td>
                <td>23 Aug 2021</td>
                <td>120.00</td>
                <td>Xsora Flower</td>
                <td>PlantMe</td>
            </tr>
            </table>   
        </div><br>

        <div class="notify" style="height:40px;">
            <table class="table1">
            <tr>
                <th style="text-align:left">Order Number</th>
                <th style="text-align:left">Date</th>
                <th style="text-align:left">Bill Amount</th>
                <th style="text-align:left">Product Name</th>
                <th style="text-align:left">Shop Name</th>
                

            </tr>
            <tr>
                <td>345674</td>
                <td>23 Aug 2021</td>
                <td>120.00</td>
                <td>Xsora Flower</td>
                <td>PlantMe</td>
            </tr>
            </table>   
        </div><br> -->
            

    </div>
    </div>
       
    <?php include_once APPROOT . '/views/includes/footer.php'; ?>

    </body>