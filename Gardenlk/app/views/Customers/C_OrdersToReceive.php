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
                <h2>My Orders - To Receive</h2>
                <div class="topnav">
                    <!--             <a class="DOrder.php" href="<?php echo URLROOT ?>/Customers/C_OrdersToPay">To Pay</a>
 --> <a href="<?php echo URLROOT ?>/Customers/C_OrdersToReceive">To Receive</a>

                </div>
                <br>


                <?php foreach ($data['order'] as $order) : ?>
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
                                <td><?php echo $order->order_id ?></td>
                                <td><?php echo $order->createdOn ?></td>
                                <td><?php echo $order->total ?></td>

                                <td><?php echo $order->itemName ?></td>

                                <td><?php echo $order->businessName ?></td>
                            </tr>
                        </table>
                    </div><br>
                <?PHP endforeach ?>


            </div>
        </div>


    </body>