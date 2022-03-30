<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cart.css">
    <?php include_once APPROOT . '/views/includes/header.php'; ?>
    <script>
        <?php include_once APPROOT . '/../public/js/cart.js'; ?>
    </script>
</head>

<body>
    <div class="container" style="margin-top:-180px;">
        <div>
            <img src="<?php echo URLROOT ?>/public/img/cartBanner1.jpg" style="margin-top:0px; width:1515px; height:440px;">
            <h1 class="plantsTopic">Cart</h1>
            <br>
        </div>
    </div>


    <table style="width:90%">
        <tr>
            <th colspan="2">Product Name</th>
            <th>Shop</th>
            <th>Unit Price</th>
            <th>Quanity</th>
            <th>Remove</th>
        </tr>
        <?php
        $total = 0;
        if (isset($_SESSION['cart'])) {
            $product_id = array_column($_SESSION['cart'], 'product_id');
            foreach ($_SESSION['cart'] as $item) :
                foreach ($data['plants'] as $plants) {

                    if ($plants->plant_id == $item['product_id']) { ?>
                        <div class="cart-items">
                            <div class="cart-row">
                                <tr>
                                    <td><img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" style="float:left height:60px; width:60px;"></td>
                                    <td><?php echo $plants->pname; ?></td>
                                    <td style="text-align: center;"><?php echo $plants->businessName; ?></td>
                                    <td style="text-align: center;" id="cart-price"><?php echo $plants->price; ?></td>
                                    <td style="text-align: center;"><input type="number" id="quantity" disabled="disable" name="qty" min="0" max="20" step="1" value="<?php echo $item['quantity']; ?>"></td>
                                    <form action="<?php echo URLROOT; ?>/pages/cart?action=remove&id=<?php echo $plants->plant_id; ?>" method="post">
                                        <td style="text-align: center;"><button type="submit" name="remove"> &times;</button></td>
                                    </form>
                                </tr>
                            </div>
                        </div>
        <?php
                        $total = $total + (float)$plants->price * $item['quantity'];
                    }
                }
            endforeach;
        } else {
            echo "<h5>Cart is Empty</h5>";
        } ?>
    </table>
    <a href="<?php echo URLROOT; ?>/sellers/plantpage"><button class="button">Continue Shopping</button></a>



    <div class="checkout">
        <h4>&nbsp Order Summary</h4>
        <?php
        if (isset($_SESSION['cart'])) {
            $product_id = array_column($_SESSION['cart'], 'product_id');
            foreach ($_SESSION['cart'] as $item) :
                foreach ($data['plants'] as $plants) {
                    if ($plants->plant_id == $item['product_id']) { ?>
                        <p>&nbsp<a href="#"><?php echo $plants->pname; ?></a> <span class="price"><?php echo $plants->price . '   x  ' . $item['quantity'] . '      =      ' .  $plants->price * $item['quantity']; ?></span></p>
        <?php
                    }
                }
            endforeach;
        } else {
            echo "<h5>Cart is Empty</h5>";
        } ?>
        <hr>
        <p> &nbsp<b>Total</b> <span class="price" style="color:black" id="cart-total-price"><b><?php echo $total; ?></b></span></p>
    </div>
    <input type="button" onclick="myFunction()" class="button" value="Proceed to Checkout">

</body>
<?php require APPROOT . '/views/includes/footer.php'; ?>

<script>
    function myFunction() {
        location.replace("<?php echo URLROOT; ?>/pages/checkout");
    }
</script>