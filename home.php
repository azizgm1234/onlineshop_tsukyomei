
<?php
include_once('./includes/headerNav.php')
      
?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>TSUKYOMEI</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/talelcss/css/fontawesome.css">
    <link rel="stylesheet" href="css/talelcss/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="css/talelcss/css/owl.css">
    <link rel="stylesheet" href="css/talelcss/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    

  </head>

<body>
<?php

      include_once('./includes/headerNav.php')
?>


  <div class="main-banner" style="background-color: #008af8;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to TSUKYOMEI</h6>
            <h2>BEST ANIME SHOP EVER!</h2>
            <p>Welcome to TSUKYOMEI, your ultimate destination for premium anime-inspired fashion! Dive into a world where your favorite anime characters come to life through stylish, high-quality apparel. Whether you're a seasoned otaku or a casual fan, we have something special for everyone.</p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                <button role="button">Search Now</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="./images/banner-image.jpg" alt="" style="height: 500px;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="./images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>wide Storage</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="./images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Custumer Service</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="./images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Quic Ready</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="./images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Easy Layout</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h6>Trending</h6>
          <h2>Trending Anime Merch</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main-button">
          <a href="shop.html">View All</a>
        </div>
      </div>
    </div>
    <div class="row"> <!-- Start a new row for the products -->
      <?php
      include "includes/config.php";
      $product_left = array();

      $sql10 = "SELECT * FROM anime ORDER BY anime.id";
      $result10 = $conn->query($sql10);
      if ($result10->num_rows > 0) {
        while($row10 = $result10->fetch_assoc()) {
      ?>    
          <div class="col-lg-3 col-md-6">
            <div class="item">
              <div class="thumb">
                <a href="animeclothes.php?id=<?php echo $row10['id']?>"><img src="admin/upload/<?php echo $row10['image'] ?>" alt="image"></a>
                <span class="price"><em>$28</em>$20</span>
              </div>
              <div class="down-content">
                <h4><?php echo $row10['name'] ?></h4>
                <a href="DeamonSlayer.html"><i class="fa fa-shopping-bag"></i></a>
              </div>
            </div>
          </div>
      <?php 
        }
      } else { 
        echo "No Results Found"; 
      }
      $conn->close(); 
      ?>
    </div> <!-- Close the product row -->
  </div> <!-- Close the container -->
</div> <!-- Close the section -->


   

<div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP GAMES</h6>
            <h2>Most Played</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">View All</a>
          </div>
        </div>
        
        <?php

include "includes/config.php";
$limit = 8;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}
$offset = ($page - 1) * $limit;

$product_left = array();

$sql10 = "SELECT products.*, anime.name AS anime_name 
          FROM products 
          LEFT JOIN anime ON products.animeid = anime.id 
          ORDER BY products.product_id DESC 
          LIMIT {$offset}, {$limit}";
$result10 = $conn->query($sql10);
if ($result10->num_rows > 0) {
// output data of each row
while($row10 = $result10->fetch_assoc()) {
?>
        
        <div class="col-lg-2 col-md-6 col-sm-6" >
          <div class="item">
            <div class="thumb">
              <a href="product.php?id=<?php echo $row10['product_id']?>"><img src="admin/upload/<?php echo $row10['product_img'] ?>"  alt="product-img"></a>
            </div>
            <div class="down-content">
                <span class="category"><?php echo $row10['product_title'] ?> <p class="date"><?php echo $row10['product_date'] ?></p></span>
                <h4><?php echo $row10['anime_name'] ?> </h4>
            </div>
          </div>
        </div>
    
    <?php }}else { echo "No Results Found"; }
             $conn->close(); 
             ?>
  </div>


  <div class="section categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Categories</h6>
            <h2>Top Categories</h2>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="./images/categories-01.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="./images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="./images/categories-03.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="./images/categories-04.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="./images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Shop</h6>
                  <h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
                </div>
                <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                <div class="main-button">
                  <a href="shop.html">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>NEWSLETTER</h6>
                  <h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                    <button type="submit">Subscribe Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2024 TSUKYOMEI. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank"></a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  </body>
</html>