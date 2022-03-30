<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo SITENAME; ?></title>
        
        <link rel="stylesheet" href="../public/css/S_report.css" > 




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['order Status', 'Count'],
          ['ToReceive',<?php echo $data['ToReceiveCount'][0]->Count ?>],
          ['ToReview',<?php echo $data['ToReviewCount'][0]->Count ?>],
          ['Completed',<?php echo $data['CompletedCount'][0]->Count ?>]
          
        ]);

        /* var data1 = google.visualization.arrayToDataTable([
          (' year', 'Day'),  
          ['2012',  900],
               ['2013',  1000],
               ['2014',  1170],
               ['2015',  1250],
               ['2016',  1530]
          
        ]); */

        var options = {
          title: 'Order Status'
        };

       

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

       /*  var options1 = {title: 'Population (in millions)'};

        var chart1 = new google.visualization.BarChart(document.getElementById('container'));
        chart1.draw(data1, options1); */
      
      }
    </script>

</head>
<body>
<?php require APPROOT . '/views/includes/header.php';?>
    <div class="container">
        <div class="column-left">
            <div class="column-left-uprow">
                <div class="uprow">
                    <img src="<?php echo URLROOT ?>/public/img/shop1.png" style="width:100px; height:100px;"/>
                </div>
                <div class="uprow">
                
                    <h5 style="padding:10px 0 0 10px">Hello</h5>
                <?php foreach($data['seller'] as $seller): ?>
                    <h2 style="padding:30px 0 0 0" ><?php echo $seller->businessName?></h2>
                <?php endforeach; ?> 
                </div>
            </div>
            <div class="box1"><ul>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard"><li><div class="box1-row" >Dashboard</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/orderhistory"><li><div class="box1-row">Orders</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/store"><li><div class="box1-row">Store</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/notification"><li><div class="box1-row">Notification</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/report"><li><div class="box1-row" id="active">Report</div></li></a>
            </div>
                
        </div>
        <div class="vertical"></div>
 
        

        <div class="column-right">
            <div class="repo">
                <div><h1 style="padding:0px 0 0 0px">Sales Report</h1></div><br>
                
                
                <table>
                <tr>
                    <th>Order No</th>
                    <th>Customer Name</th>
                    <th>Order Status</th>
                    <th>Date & Time</th>
                    <th>Order Item Quantity</th>
                    <th>Order Amount</th>
                </tr>
                <?php foreach($data['order'] as $order): ?>
                    

                        <tr>
                            <td><?php echo $order->order_id; ?></td>
                            <td><?php echo $order->FullName; ?></td>
                            <td><?php echo $order->order_status; ?></td>
                            <td><?php echo $order->createdOn; ?></td>
                            <td><?php echo $order->solditems; ?></td>
                            <td><?php echo $order->total; ?>.00</td>   
                        </tr>

                    
                <?php endforeach; ?>

                <?php foreach($data['sum'] as $sum): ?>
                    <?php foreach($data['sumsolditems'] as $sumsolditems): ?>
                <tr> 
                    <th colspan="4" style="color: red;">Total</th>
                    <th style="color: red;"><?php echo $sumsolditems->sumsolditems; ?></th> 
                    <th style="color: red;"><?php echo $sum->sum; ?>.00</th> 
                </tr>
                <?php endforeach; ?>
                 <?php endforeach; ?>
                </table>
               
                    <table style="margin-top: 20px;">
                        <tr>
                        <?php foreach($data['orderCount'] as $orderCount): ?>
                            <td style="border: none;"><div style="background-color:#D5E1C9;  "><h2 style="padding: 10px 14px;">Number of Orders : <?php echo $orderCount->Count; ?></h2> </div> </td style="border: none;">
                        <?php endforeach; ?>
                        <?php foreach($data['customerCount'] as $customerCount): ?>
                            <td style="border: none;"><div style="background-color:#D5E1C9; height:100%; "><h2 style="padding: 10px 14px;">Number of Customers : <?php echo $customerCount->Count; ?></h2> </div> </td>
                        <?php endforeach; ?>
                        </tr>
                    </table>
               
                <div id="piechart" style="width: 900px; height: 500px;"></div>
                
                <div id="container" style="width: 900px; height: 500px;"></div>

            </div>
            

            
            
        </div >
    </div>
    
</body>
<?php require APPROOT . '/views/includes/footer.php';?>