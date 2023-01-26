<?php

session_start();

require_once ('getdatabase.php');
require_once ('component.php');


// create instance of Createdb class
$database = new CreateDb("mandatech", "products");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['shoppingCart'])){

        $item_array_id = array_column($_SESSION['shoppingCart'], "id");

        if(in_array($_POST['id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = '../views/products.php'</script>";
        }else{

            $count = count($_SESSION['shoppingCart']);
            $item_array = array(
                'id' => $_POST['id']
            );

            $_SESSION['shoppingCart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'id' => $_POST['id']
        );

        // Create new session variable
        $_SESSION['shoppingCart'][0] = $item_array;
        print_r($_SESSION['shoppingCart']);
    }
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <title>Products</title>

    <link href="../css/styles.css" rel="stylesheet" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

</head>
<body>
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

           <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="/mandatech/index.php">MANDATECH</a>
           <!-- Navbar Items-->
           <ul class="navbar-nav align-items-center ms-auto">
           <li class="nav-item no-caret d-none d-md-block me-3">
           <a class="nav-link" href="/mandatech/index.php">
                       <div class="fw-500">Home</div>
           </a>
           <li class="nav-item dropdown ">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../views/productsmonitor.php">Monitors</a>
          <a class="dropdown-item" href="../views/productsmkb.php">Mice & Keyboards</a>
          <a class="dropdown-item" href="../views/productshm.php">Headsets & Microphones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../views/products.php">All Products</a>
        </div>
      </li>
           <li class="nav-item no-caret d-none d-md-block me-3">
           <a class="nav-link" href="../views/about.php">
                       <div class="fw-500">About</div>
           </a>
           </li>
           <li class="nav-item no-caret d-none d-md-block me-3">
           <a class="nav-link" href="../views/contact.php">
                       <div class="fw-500">Contact Us</div>
           </a>
           </li>
           <li class="nav-item no-caret d-none d-md-block me-3">
           <a class="btn btn-dark btn-sm" type="button" href="../views/login.php">Login</a>
           </li>
           <li>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="../views/cart.php" class="nav-item nav-link active">
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

<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getDataHeadsetAndMic();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['name'], $row['dsc'], $row['price'],$row['img'] ,$row['id']);
                }
            ?>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
