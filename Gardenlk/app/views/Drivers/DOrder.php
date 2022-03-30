<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITENAME; ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Driver.css">


</head>

<body>
  <?php include_once APPROOT . '/views/includes/header.php'; ?>


  <div class="row">

    <div class="main">
      <h2>Orders</h2>
      <div class="topnav">
        <a href="<?php echo URLROOT ?>/Drivers/DOrder">New Deliveries</a>
        <a href="<?php echo URLROOT ?>/Drivers/Dtobedelivered">To be Delivered</a>
        <a href="<?php echo URLROOT ?>/Drivers/Dhistory">History</a>
      </div>
      <br>

      <pre>

      <?php //echo json_encode($data['delivery']) ?>
      </pre>
      <?php foreach ($data['delivery'] as $orderDetails) : ?>

        
        <a href="<?php echo URLROOT ?>/Drivers/DorderView?order_id=<?php echo $orderDetails->orderID; ?>&seller_id=<?php echo $orderDetails->shopID ?>" target="orderview">


          <div class="notify" style="height:80px; width: 100%;">
            <table class="table1">
              <tr>
                <th style="text-align:left">Order Number</th>
                <th style="text-align:left">Order Date</th>
                <th style="text-align:left">Order Time</th>

              </tr>
              <tr>
                <td id="orderid"><?php echo $orderDetails->orderID; ?></td>
                <td><?php echo $orderDetails->createdOn; ?></td>
                <td><?php echo $orderDetails->createdWhen; ?></td>
              </tr>
            </table>
          </div>
        </a>
        <br>
      <?php endforeach; ?>
    </div>
    <div class="vl"></div>

    <iframe src="<?php echo URLROOT ?>/Drivers/DorderView?order_id=<?php echo $orderDetails->orderID; ?>&seller_id=<?php echo $orderDetails->sellerID ?>" frameborder="none" name="orderview" height="1000px" width="45%"></iframe>
  </div>
  </div>


</body>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>