<?php require APPROOT . '/views/includes/header.php';?>
 <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/S_orderDetail.css">
<style>
    .result{
        margin-left: 20px;
        border: 3px solid #418d03;
    }
    .frame{
        width: 500px;
        height: 500px;
    }
</style>

<body>
<!--------------------------------------details on order -done------------------------------->
<div class="cont">
        <h1>Order Details</h1>
        <br>
        <div class="column">
            <div class="leftcol">
                <?php /*foreach($data['orders'] as $details) : */?>
                <table>
                    <tr>
                    <td>Order no : <?php echo $data['orders']->order_id?></td>
                    <td>Order Date :<?php echo $data['orders']->createdOn?></td>
                    </tr>

                    <tr>
                    <td>Customer Name :<?php echo $data['orders']->FullName?></td>
                    <td>Payment Status :<?php echo $data['orders']->payment_status?></td>
                    </tr>

                    <tr>
                    <td>Bill Amount :<?php echo $data['orders']->total ?></td>
                    <td>Total Items :<?php echo $data['orders']->quantity ?></td>
                    </tr>

                    <tr>
                    <td>Placed Date :<?php echo $data['orders']->createdOn?></td>
                    <td>order Status: </td>
                    </tr>

                </table><?php /*endforeach;*/ ?>
                <div>
                    <a href="<?php echo URLROOT ?>/Sellers/orderhistory"><button class="button1">Back</button></a>
<!--                     <input class="button1" type=button onClick='window.open("<?php echo URLROOT; ?>/sellers/showDrivers","demo","width=700px,height=300px,left=150,top=200,scrollbars=0,status=0,")' value="Driver ">
 -->                    
                </div>
                <br />
               <!-- <div class="result">
                    <iframe src="" class="frame">
                        

                    </iframe>
                </div>-->
            </div>
            <div class="rightcol">
                <img src="<?php echo URLROOT ?>/public/img/orderimg.jpg" class="img">
            </div>
        </div>
    </div>



</body>
<?php require APPROOT . '/views/includes/footer.php';?>