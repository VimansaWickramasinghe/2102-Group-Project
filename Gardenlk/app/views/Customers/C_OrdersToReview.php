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
                <h2>My Orders - To Review</h2>
                <div class="topnav">
                    <a href="<?php echo URLROOT ?>/Customers/C_OrdersToReview" id="active">To Review</a>
                    <a href="<?php echo URLROOT ?>/Customers/C_OrdersHistory">History</a>
                </div>
                <br>
                <div>
                    <?php foreach ($data['seller'] as $seller) : ?>
                        <pre>
               <?php //echo json_encode($seller) 
                ?>
           </pre>

                        <table class="table1" style="border: 1px solid #958F8F ;width: 90%;">

                            <tr class="orders-table-head">
                                <td colspan="3">OrderNo -<?php echo $seller->order_id; ?></td>
                                <td colspan="3">Placed On <?php echo $seller->createdOn; ?></td>
                            </tr>

                            <tr>

                                <a href="<?php echo URLROOT; ?>/sellers/sellershoppage/<?php echo $seller->shopID; ?>">
                                    <div>
                                        <td>
                                            <div><img src="<?php echo URLROOT ?>/public/img/<?php echo $seller->shopimg; ?>" class="profimg">
                                        </td>
                                        <td>
                                            <h3 class="shopName"><?php echo $seller->businessName; ?></h3>
                                    </div>
                                    </td>
                                    <td style="overflow:hidden;word-wrap:break-word;">
                                        <div><?php echo $seller->businessAddress; ?> </div>
                                    </td>
                                    <td colspan="4">
                                        <a href="<?php echo URLROOT ?>/Pages/feedback?seller_id=<?php echo  $seller->shopID ?>&order_id=<?php echo  $seller->order_id ?>"><input type="submit" name="Add Review" class="btn1" value="Add Review" /></a>
                                    </td>

                </div>
                </a>

                </tr>

                </table> <br><br>
            <?php endforeach; ?>


            </div><br>


        </div>
        </div>


    </body>