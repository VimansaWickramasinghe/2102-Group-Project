<?php include_once APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/index.css">
</head>

<body>

  <div class="slideshow-container">

    <div class="mySlides fade">
      <img src="<?php echo URLROOT ?>/public/img/index4.jpg" style="width:100%">
      <div class="text">Plants & Flowers</div>
      <a href="<?php echo URLROOT; ?>/Sellers/plantpage" class="btn">Shop Now</a>
    </div>

    <div class="mySlides fade">
      <img src="<?php echo URLROOT ?>/public/img/index3.jpg" style="width:100%">
      <div class="text">Sellers & Brands</div>
      <a href="<?php echo URLROOT; ?>/Sellers/sellerpage" class="btn">Shop Now</a>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

  </div>
  <br>

  <!-- dots --------------------->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
  </div><br>

  <h1 style="text-align: center; margin:80px;">New Arrivals</h1>

  <div class="flex-container">
    <?php foreach ($data['plants'] as $plants) : ?>
      <div class="card">
        <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>"><img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" style="width:300px; height:320px;"></a>
        <h5><?php echo $plants->pname; ?></h5>
        <h4 class="price"><?php echo $plants->price; ?></h4>
        <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>">
          <button type="submit" name="add">View More &#128722;</button>
        </a>
      </div>
    <?php endforeach; ?>
  </div>




  <h1 class="hero-text1">Best Selling</h1>
  <div class="flex-container">
    <?php foreach ($data['bestselling'] as $plants) : ?>
      <div class="card">
        <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plantID; ?>"><img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" style="width:300px; height:320px;"></a>
        <h5><?php echo $plants->pname; ?></h5>
        <h4 class="price"><?php echo $plants->price; ?></h4>
        <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>">
          <button type="submit" name="add">View More &#128722;</button>
        </a>
      </div>
    <?php endforeach; ?>
  </div>




  <h1 style="text-align: center; margin:80px;">Top Rated</h1>

  <div class="flex-container">
    <?php foreach ($data['plants'] as $plants) : ?>
      <div class="card">
        <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>"><img src="<?php echo URLROOT ?>/public/img/<?php echo $plants->img1; ?>" style="width:300px; height:320px;"></a>
        <h5><?php echo $plants->pname; ?></h5>
        <h4 class="price"><?php echo $plants->price; ?></h4>
        <a href="<?php echo URLROOT; ?>/sellers/plant/<?php echo $plants->plant_id; ?>">
          <button type="submit" name="add">View More &#128722;</button>
        </a>
      </div>
    <?php endforeach; ?>
  </div>








  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>

</body>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>

</html>