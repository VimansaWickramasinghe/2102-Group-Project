<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/feedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include_once APPROOT . '/views/includes/header.php'; ?>
    <div class="heading">
        <h1 style="padding: 30px 10px 10px 50px;">Are You Happy With Our Service? </h1>
    </div>
    <section>
 
        <!-- 1 feedback box -->

        <div>
            <form action="<?php echo URLROOT; ?>/pages/feedback" method="post">
                <img src="<?php echo URLROOT ?>/public/img/a.png" class="pic">
                <h6 style="text-align: center;">How was the delivery ?</h6>
                <div class="rate">
                    <input type="radio" id="star1" name="starRate" value="1" />
                    <label for="star1" title="text">1 stars</label>
                    <input type="radio" id="star2" name="starRate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star3" name="starRate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star4" name="starRate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star5" name="starRate" value="5" />
                    <label for="star5" title="text">5 star</label>

                </div>
                <textarea id="feedback_driver" name="feedback_msg_driver" placeholder="Have any feedbacks" style="height:100px;width: 80%;margin:60px 30px 30px 30px"></textarea>

        </div>

        <!-- 2 feedback box -->

        <div>
            <img src="<?php echo URLROOT ?>/public/img/c.png" class="pic">
            <h6 style="text-align: center;">Rate our shop</h6>
            <div class="rate1">
                <input type="radio" id="heart1" name="heartRate" value="5" />
                <label for="heart1" title="text"> 5 hearts</label>
                <input type="radio" id="heart2" name="heartRate" value="4" />
                <label for="heart2" title="text"> 4 hearts</label>
                <input type="radio" id="heart3" name="heartRate" value="3" />
                <label for="heart3" title="text"> 3 hearts</label>
                <input type="radio" id="heart4" name="heartRate" value="2" />
                <label for="heart4" title="text"> 2 hearts</label>
                <input type="radio" id="heart5" name="heartRate" value="1" />
                <label for="heart5" title="text"> 1 heart</label>

            </div>
            <textarea id="feedback_seller" name="feedback_msg_seller" placeholder="Have any feedbacks" style="height:100px;width: 80%;margin:80px 30px 30px 30px"></textarea>
        </div>
    </section>
    <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>">
    <input type="hidden" name="seller_id" value="<?php echo $_GET['seller_id'] ?>">
    <button class="block" type="submit">Continue</button>

    </form>


</body>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>

</html>