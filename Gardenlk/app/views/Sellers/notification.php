<?php require APPROOT . '/views/includes/header.php';?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_notification.css">

<body>

<div class="container">
    
    <div class="column-left"> 
        <div class="column-left-uprow">
            <div class="uprow">
                <!-- profile pic-->
                <img src="<?php echo URLROOT ?>/public/img/shop1.png" style="width:100px; height:100px;"/>
            </div>
            
         
            <div class="uprow">
                <h5 style="padding:10px 0 0 10px">Hello</h5>
                <h2 style="padding:30px 0 0 0" >Garden Center</h2>
            </div>
               
        </div>
        <!-- navigation -->
        
        <div class="box1"><ul>
            <a href="<?php echo URLROOT ?>/Sellers/dashboard"><li><div class="box1-row">Dashboard</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/orderhistory"><li><div class="box1-row">Orders</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/store"><li><div class="box1-row">Store</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/notification"><li><div class="box1-row" id="active">Notification</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/report"><li><div class="box1-row">Report</div></li></a>
         </div>
</div>


    <!--horizontal line-->
    <div class="vl"></div>  
    
    
    <div class="col2">
    <div><h1 style="padding:0px 0 0 300px">Notifications</h1></div><br>
        <br>
       
        <div><!--Notification Card 1--> 
            <table class="table1">
             <tr>
                <td rowspan="3" style="text-align:justify"><img src="<?php echo URLROOT ?>/public/img/shop3.jpg" width="60px" height="60px;"></td>
                <td><b>Cactus Shop</b></td>
                <td></td>
                <td style="text-align:right" >2021/09/20</td>
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






        <div><!--Notification Card 2--> 
            <table class="table1">
             <tr>
                <td rowspan="3" ><img src="<?php echo URLROOT ?>/public/img/shop1.png" width="60px" height="60px;"></td>
                <td><b>Garden Center</b></td>
                <td></td>
                <td style="text-align:right" >2021/09/20</td>
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






        <div><!--Notification Card 3--> 
            <table class="table1">
             <tr>
                <td rowspan="3" ><img src="<?php echo URLROOT ?>/public/img/shop2.png" width="60px" height="60px;"></td>
                <td><b>Bassett's</b></td>
                <td></td>
                <td style="text-align:right" >2021/09/20</td>
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






        <div><!--Notification Card 3--> 
            <table class="table1">
             <tr>
                <td rowspan="3" ><img src="<?php echo URLROOT ?>/public/img/shop2.png" width="60px" height="60px;"></td>
                <td><b>Bassett's</b></td>
                <td></td>
                <td style="text-align:right" >2021/09/20</td>
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







        <div><!--Notification Card 3--> 
            <table class="table1">
             <tr>
                <td rowspan="3" ><img src="<?php echo URLROOT ?>/public/img/shop2.png" width="60px" height="60px;"></td>
                <td><b>Bassett's</b></td>
                <td></td>
                <td style="text-align:right" >2021/09/20</td>
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
       
    <div><?php include_once APPROOT . '/views/includes/footer.php'; ?></div>


    </body>
    </html>