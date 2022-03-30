<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/C_Orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>



<?php include_once APPROOT . '/views/includes/header.php'; ?>

<body>

    <div class="row">

        <?php include_once APPROOT . '/views/includes/C_sidenav.php'; ?>

        <!--horizontal line-->
        <div class="vl"></div>


        <div class="col2">
            <h2>My Orders - To Review</h2>
            <div class="topnav">
                <a href="<?php echo URLROOT ?>/Customers/C_OrdersToReview" id="active">To Review</a>
                <a href="<?php echo URLROOT ?>/Customers/C_OrdersHistory">History</a>
            </div>
            <br>
            <?php foreach ($data['plants'] as $key => $plantDetails) : ?>

                <div>
                    <table class="orders-table">

                        <tr class="orders-table-head">
                            <td colspan="5">OrderNo - <?php echo $plantDetails->order_id; ?></td>
                            <td colspan="5" style="text-align:right;">Placed On <?php echo $plantDetails->createdOn; ?></td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo URLROOT ?>/public/img/<?php echo $plantDetails->img1; ?>" class="imgplant"></td>
                            <td colspan="2"><?php echo $plantDetails->pname; ?></td>
                            <td colspan="6" style="text-align:left;"><?php echo $plantDetails->description; ?></td>

                            <td>
                                <form action="<?php echo URLROOT; ?>/customers/C_ReviewPlants" method="post">
                                    <div class="rating">
                                        <!-- Thumbs up -->
                                        <div>
                                            <div class="like grow">
                                                <input type="hidden" name="LikeDislike" value="like" />
                                                <i class="fa fa-thumbs-up fa-3x like" id="like_<?php echo $key ?>" aria-hidden="true" onclick="likeBtn(<?php echo $key ?>,<?php echo $plantDetails->order_id; ?>,<?php echo $plantDetails->plantID; ?>)" style="font-size: 2rem;"></i>
                                            </div>
                                            <!-- Thumbs down -->
                                            <div class="dislike grow">
                                                <input type="hidden" name="LikeDislike" value="dislike" />
                                                <i class="fa fa-thumbs-down fa-3x like" id="dislike_<?php echo $key ?>" aria-hidden="true" onclick="dislikeBtn(<?php echo $key ?>,<?php echo $plantDetails->order_id; ?>,<?php echo $plantDetails->plantID; ?>)" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    </table>
                </div><br>
            <?php endforeach; ?>
            </form>
            <form action="<?php echo URLROOT; ?>/customers/Reviewed" method="post">
                <input type="hidden" name="sellerID" value="<?php echo $_GET['seller_id'] ?>" />
                <input type="hidden" name="orderID" value="<?php echo $_GET['order_id'] ?>" />
                <button type="submit" class="button1" value="submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        function likeBtn(id, orderId, plantId) {
            event.preventDefault();
            $('#dislike_' + id).removeClass('active');
            $('#like_' + id).addClass('active');
            submitLikDislike('like', orderId, plantId);

        }

        function dislikeBtn(id, orderId, plantId) {
            event.preventDefault();
            $('#like_' + id).removeClass('active');
            $('#dislike_' + id).addClass('active');
            submitLikDislike('dislike', orderId, plantId);

        }

        function submitLikDislike(string, orderId, plantId) {
            var data = {
                status: string,
                orderId: orderId,
                plantId: plantId
            }

            $.ajax({
                url: "<?php echo URLROOT; ?>/Customers/C_ReviewPlantsStore",
                type: "POST",
                data: data,
                success: function(data) {
                    console.log(data);
                }
            });
        }
    </script>

</body>

<!--  <?php include_once APPROOT . '/views/includes/footer.php'; ?> -->