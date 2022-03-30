<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/contact.css">
</head>
<body>
<?php include_once APPROOT . '/views/includes/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="column">
      <img src="<?php echo URLROOT ?>/public/img/LOGO.png" alt="" style="width: 300px;"class="center" ><br>
      <h2>Email : garden.lk@gmail.com</h2><br>
      <h2>Call Us : +941222334</h2><br>
      <h2>Follow Us :</h2>
      <div class="socialMedia">
          <div class="social-item"><a href="https://www.facebook.com/" target="_blank"> <img src="<?php echo URLROOT ?>/public/img/fb.png" class="social-icon" alt=""> </a></div>
          <div class="social-item"><a href="https://www.instagram.com/" target="_blank"> <img src="<?php echo URLROOT ?>/public/img/insta.png" class="social-icon" alt=""> </a></div>
          <div class="social-item"><a href="https://www.twitter.com/" target="_blank"><img src="<?php echo URLROOT ?>/public/img/twitter.png" class="social-icon" alt=""> </a></div>
      </div>
    </div>

    <div class="vl"></div>
    <div class="column">
      <h2></h2>
      <div class="box">
        <form method="POST" action="<?php echo URLROOT ?>/pages/contact">
          <label for="fname">Name</label>
          <input type="text" id="name" name="name" placeholder="Name">

          <label for="lname">Email</label>
          <input type="text" id="emial" name="email" placeholder="Email">

          <label for="subject">Message</label>
          <textarea id="msg" name="msg" placeholder="Write something.." style="height:200px"></textarea>

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

</body>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>
</html>