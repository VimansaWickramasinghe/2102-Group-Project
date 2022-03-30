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
  <div class="side">
    <div class="box">
      <h3>Delivery To </h3>
      <h4>Order No : <?php echo $data['order_id'] ?></h4>
    </div>
    <div class="Mapbox">
      <div class="adrs">
        <div><img src="<?php echo URLROOT ?>/public/img/1c.png">&nbsp <?php echo  $data['customerDetails']->FullName ?></div><br>
        <div style="overflow: auto;"><img src="<?php echo URLROOT ?>/public/img/1a.png">&nbsp <?php echo  $data['customerDetails']->Line1 ?>, <?php echo  $data['customerDetails']->Line2 ?>, <?php echo  $data['customerDetails']->City ?>.</div><br>
        <div><img src="<?php echo URLROOT ?>/public/img/1b.png">&nbsp <?php echo  $data['customerDetails']->ContactNo ?></div>
      </div>
    </div>
    <h4>Shop Name : <?php echo  $data['shopDetails']->businessName ?>
      <br>
      Address :<Address><?php echo  $data['shopDetails']->businessAddress ?></Address><br>

    </h4>

    <?php foreach ($data['orderviewDetails'] as $orderviewDetails) { ?>
      <?php if ($orderviewDetails->shopID == $_GET['seller_id'] && $data['customerDetails']->customer_id == $orderviewDetails->customer_id) { ?>
        <div class="fakeimg" style="height:80px;">
          <table class="table1">
            <tr>
              <th rowspan="2"><img src="<?php echo URLROOT ?>/public/img/plant.png" style="float:left"></th>
              <th rowspan="2" style="text-align: left;">Alovera</th>
              <th style="text-align:left">Quantity</th>
              <th style="text-align:center">1</th>
            </tr>
            <tr>
              <td colspan="3">Size</td>
              <td style="text-align:center">Small</td>
            </tr>
          </table>
        </div>
        <br>
    <?php }
    } ?>
    <h3>Sub Total :<span style="padding-left: 65%;">Rs.1950</h3>
    <h3 style="color: #097F28;">Total :<span style="padding-left: 73%;">Rs.1950</h3>
    <div class="AR">
      <form action="<?php echo URLROOT; ?>/drivers/toDeliver" method="post">
        <input type="hidden" name="seller_id" value="<?php echo $_GET['seller_id'] ?>">
        <input type="hidden" name="order_id" value="<?php echo $data['order_id'] ?>">

        <button class="accept" type="submit">Accept Order</button>
      </form>
      <!-- <button class="reject">Reject Order</button> -->
    </div>
  </div>

</body>