<?php
session_start();
include "includes/config.php";
?>
<?php
   include_once('./includes/headerNav.php')
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>

<div class="section trending">
    <div class="container">
        <ul class="trending-filter">
            <h3 style="color: #EE626B; margin-bottom: 20px;"></h3>
            <li><a class="is_active" href="#!" data-filter="*">Show All</a></li>
            <li><a href="#!" data-filter=".adv">Adventure</a></li>
            <li><a href="#!" data-filter=".str">Strategy</a></li>
            <li><a href="#!" data-filter=".rac">Racing</a></li>
        </ul>
        <div class="row trending-box">
            <?php
            $limit = 8;

            // Ensure the anime ID is set
            if (isset($_GET['id'])) {
                $_SESSION['id'] = $_GET['id'];
            } else if (isset($_SESSION['id'])) {
                $_GET['id'] = $_SESSION['id'];
            } else {
                // Handle the case where no ID is provided
                die('Anime ID not specified.');
            }

            $anime_id = $_SESSION['id'];

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }

            $offset = ($page - 1) * $limit;

            $sql10 = "SELECT products.*, anime.name AS anime_name 
                      FROM products 
                      LEFT JOIN anime ON products.animeid = anime.id 
                      WHERE products.animeid = ? 
                      ORDER BY products.product_id DESC 
                      LIMIT ?, ?";
            $stmt = $conn->prepare($sql10);
            $stmt->bind_param('iii', $anime_id, $offset, $limit);
            $stmt->execute();
            $result10 = $stmt->get_result();

            if ($result10->num_rows > 0) {
                while ($row10 = $result10->fetch_assoc()) {
            ?>
            <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
                <div class="item">
                    <div class="thumb">
                    <a href="product.php?id=<?php echo $row10['product_id']?>"><img src="admin/upload/<?php echo $row10['product_img'] ?>"  alt="product-img"></a>
                        <span class="price"><em>$36</em>$24</span>
                    </div>
                    <div class="down-content">
                        <span class="category"><?php echo $row10['anime_name']; ?></span>
                        <h4><?php echo $row10['product_title']; ?></h4>
                        <a href="product-details.php?id=<?php echo $row10['product_id']; ?>"><i class="fa fa-shopping-bag"></i></a>
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
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <ul class="pagination">
                <li><a href="#"> &lt; </a></li>
                <li><a href="#">1</a></li>
                <li><a class="is_active" href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"> &gt; </a></li>
            </ul>
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
