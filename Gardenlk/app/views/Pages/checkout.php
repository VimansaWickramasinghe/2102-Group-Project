<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/checkout.css">
    <?php include_once APPROOT . '/views/includes/header.php'; ?>

</head>

<body>
    <div class="container">

        <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
            <input type="hidden" name="merchant_id" value="1219599">
            <input type="hidden" name="return_url" value="http://localhost/Gardenlk/Pages/index">
            <input type="hidden" name="cancel_url" value="http://localhost/Gardenlk/Pages/cancel">
            <input type="hidden" name="notify_url" value="http://localhost/Gardenlk/Pages/notify">

            <div class="leftCol">
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                ?>
                    <table>
                        <!--shop card 1-->
                        <tr>
                            <!--shop details-->
                            <input type="hidden" name="order_id" class="text1" value="1234">
                            <th><img src="<?php echo URLROOT ?>/public/img/LOGO.png" class="siteIcon" /></th>
                            <th></th>
                            <th> </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <br>
                        <input type="hidden" id="customer_id" value="<?php echo $_SESSION['cus_id'] ?>">
                        <?php
                        foreach ($_SESSION['cart'] as $key => $item) :
                            $key++;
                            foreach ($data['plants'] as $plants) {

                                if ($plants->plant_id == $item['product_id']) { ?>
                                    <input type="hidden" id="db_item_name_<?php echo $key ?>" value="<?php echo $plants->pname ?>">
                                    <input type="hidden" id="db_plantId_<?php echo $key ?>" value="<?php echo $plants->plant_id ?>">
                                    <input type="hidden" id="db_quantity_<?php echo $key ?>" value="<?php echo $item['quantity'] ?>">
                                    <input type="hidden" id="db_shopId_<?php echo $key ?>" value="<?php echo $plants->seller_id ?>">

                                    <input type="hidden" name="item_name_<?php echo $key ?>" class="text1" value="<?php echo $plants->pname ?>">
                                    <input type="hidden" name="item_number_<?php echo $key ?>" class="text1" value="<?php echo  $key  ?>">
                                    <input type="hidden" name="amount_<?php echo $key ?>" class="text1" value="<?php echo $plants->price ?>">
                                    <input type="hidden" name="quantity_<?php echo $key ?>" class="text1" value="<?php echo $item['quantity'] ?>">

                                    <!--Checkout plant items view table raw-->
                                    <tr>
                                        <td colspan="2"><img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" class="imgplant" /></td>
                                        <td></td>
                                        <td colspan="3" style="text-align:left;"><?php echo $plants->pname; ?></td>
                                        <td></td>
                                        <input type="hidden" class="text1" value="LKR"><?php $total = $total + (int)$plants->price * $item['quantity']; ?>
                                        <input type="hidden" class="text1" value="<?php echo $total + ".00"; ?>">
                                        <td colspan="2">Rs.<?php echo $plants->price . '    ' . 'x' . $item['quantity'] . ' '; ?></td>
                                        <td></td>
                                    </tr>
                    <?php
                                }
                            }
                        endforeach;
                    } else {
                        echo "<h5>Cart is Empty</h5>";
                    } ?>
                    </table>

                    <input type="hidden" id="total_amount" name="amount" class="text1" value="<?php echo $total + 240.00; ?>">
                    <br>

                    <input type="button" id="formSubmit" class="Cartbutton1" value="Proceed To Pay">
                    <input type="submit" id="payhere_button" class="Cartbutton1" style="display: none;" value="Proceed To Pay" name="submit">

            </div>



            <div class="rightCol">
                <?php foreach ($data['customer'] as $customers) : ?>
                    <h2>Billing And Delivery</h2>
                    <input type="hidden" class="field" name="first_name" value="<?php echo $customers->FullName ?>">
                    <input type="hidden" class="field" name="last_name" value="">
                    <div class="text1"><input type="text" class="field" name="address" value="<?php echo $customers->Line1 ?><?php echo $customers->Line2 ?>,<?php echo $customers->City ?>"></div>
                    <a href="">
                        <div class="text2"></div>
                    </a>
                    <div class="text3"><input type="text" class="field" name="phone" value="<?php echo $customers->ContactNo ?>"><br></div>
                    <a href="">
                        <div class="text4"></div>
                    </a>
                    <div class="text5"><input type="text" class="field" name="email" value="<?php echo $customers->Email ?>"></div>
                    <a href="">
                        <div class="text6"></div>
                    </a>

            </div>




            <div class="rightCol">
                <h2>Order Summary</h2>
                <div class="text1">Sub Total</div>
                <a href="">
                    <div class="text2"><?php echo $total; ?>.00</div>
                </a>
                <div class="text3">Delivery Charges</div>
                <a href="">
                    <div class="text4">240.00</div>
                </a>
                <div class="text5">Total</div>
                <a href="">
                    <div class="text6"><?php $total = $total + 240;
                                        echo $total ?>.00</div>
                </a>
                <input type="hidden" class="field" name="city" value="<?php echo $customers->City ?>">
                <input type="hidden" name="country" value="Sri Lanka">
                <input type="hidden" name="currency" class="text1" value="LKR">
                <input type="hidden" name="items" class="text1" value="plants">
                <div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    </form>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {

        $('#formSubmit').click(function() {
            storeData();
        });

        function storeData() {
            $('#formSubmit').attr('disabled', true);
            var cart = '<?php echo json_encode($_SESSION['cart']); ?>';
            cart = JSON.parse(cart);
            let customer_id = $('#customer_id').val();
            let items = []
            if (cart.length > 0) {
                cart.forEach((element, key) => {
                    key++
                    let item = {
                        item_name: $('#db_item_name_' + key).val(),
                        plantId: $('#db_plantId_' + key).val(),
                        quantity: $('#db_quantity_' + key).val(),
                        shopId: $('#db_shopId_' + key).val(),
                    }
                    items.push(item);
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo URLROOT; ?>/pages/placeOrder",
                    data: {
                        customer_id: customer_id,
                        items: items,
                        total: '<?php echo  $total ?>'
                    },
                    success: function(res) {
                        console.log(res);
                        $('#formSubmit').attr('disabled', false);
                        $('#payhere_button').click();

                    }
                });
            }
        }
    });
</script>