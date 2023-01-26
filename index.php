<?php
session_start();
// Include functions and connect to the database using PDO MySQL
include 'views/config.php';
require_once ('views/getdatabase.php');
require_once ('views/component.php');
$database = new CreateDb("mandatech", "products");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mandatech</title>
        <link href="css/styles.css" rel="stylesheet" /> <!-- css for whole page -->
        <link href="css/indexcss.css" rel="stylesheet" /> <!-- css for slider -->
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed" style="background-color: #111B4A;">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">MANDATECH</a>
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
            <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link active" href="index.php">
                        <div class="fw-500">Home</div>
            </a>
            </li>
            <li class="nav-item dropdown ">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="views/productsmonitor.php">Monitors</a>
          <a class="dropdown-item" href="views/productsmkb.php">Mice & Keyboards</a>
          <a class="dropdown-item" href="views/productshm.php">Headsets & Microphones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="views/products.php">All Products</a>
        </div>
      </li>
            <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link" href="views/about.php">
                        <div class="fw-500">About</div>
            </a>
            </li>
            <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link" href="views/contact.php">
                        <div class="fw-500">Contact Us</div>
            </a>
            </li>
            <li class="nav-item no-caret d-none d-md-block me-3">
              <a class="btn btn-dark btn-sm" type="button" href="views/login.php">Login</a>
            </li>
            <li>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="../mandatech/views/cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['shoppingCart'])){
                            $count = count($_SESSION['shoppingCart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>
            </li>

            </ul>
        </nav>
                <main>
                    <!-- Main page content-->

                  <div class="sliderbody">
                    <!--image slider start-->
                    <div class="slider">
                      <div class="slides">
                        <!--radio buttons start-->
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <!--radio buttons end-->
                        <!--slide images start-->
                        <div class="slide first">
                          <img src="1.jpg" alt="">
                        </div>
                        <div class="slide">
                          <img src="2.jpg" alt="">
                        </div>
                        <div class="slide">
                          <img src="3.jpg" alt="">
                        </div>
                        <div class="slide">
                          <img src="4.jpg" alt="">
                        </div>
                        <!--slide images end-->
                        <!--auto nav start-->
                        <div class="navigation-auto">
                          <div class="auto-btn1"></div>
                          <div class="auto-btn2"></div>
                          <div class="auto-btn3"></div>
                          <div class="auto-btn4"></div>
                        </div>
                        <!--auto nav end-->
                      </div>
                      <!--manual nav start-->
                      <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                      </div>
                      <!--manual nav end-->
                    </div>
                    <!--image slider-->
                  </div>
<!--
                  <div class="about-me-index">
                    <img src="aboutme_index.jpg" alt="" class="about-me-img">
                  </div>

                  <div class="contact-index">
                    <img src="contact_index.jpg" alt="">
                  </div>
-->
<div class="row text-center py-5">
<?php
        $result = $database->getDataFeatured();
        while ($row = mysqli_fetch_assoc($result)){
            featured($row['name'], $row['dsc'], $row['price'],$row['img'] ,$row['id']);
        }
    ?>
</div>
                </main>
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Mandatech 2022</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
