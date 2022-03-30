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


            <div class="col2">
                <h2>My Orders - History</h2>
                <div class="topnav">

                    <a href="<?php echo URLROOT ?>/Customers/C_OrdersToReview">To Review</a>
                    <a href="<?php echo URLROOT ?>/Customers/C_OrdersHistory">History</a>
                </div>
                <br>

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

                </div>
                <br>

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
                </div><br>


            </div>
        </div>


    </body>