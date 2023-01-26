<?php

session_start();

require_once ('getdatabase.php');
require_once ('component.php');

$db = new CreateDb("mandatech", "products");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['shoppingCart'] as $key => $value){
          if($value["id"] == $_GET['id']){
              unset($_SESSION['shoppingCart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = '../views/cart.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body class="bg-light">
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

           <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="/mandatech/index.php">MANDATECH</a>
           <!-- Navbar Items-->
           <ul class="navbar-nav align-items-center ms-auto">
           <li class="nav-item no-caret d-none d-md-block me-3">
           <a class="nav-link" href="../index.php">
                       <div class="fw-500">Home</div>
           </a>
            </li>
           <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['shoppingCart'])){
                        $product_id = array_column($_SESSION['shoppingCart'], 'id');

                        $result = $db->getDataAllProducts();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['img'], $row['name'],$row['price'], $row['id']);
                                    $total = $total + (int)$row['price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['shoppingCart'])){
                                $count  = count($_SESSION['shoppingCart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>PHP <?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>PHP <?php
                            echo $total;
                            ?></h6>
                                          <a href="checkout.php" class="btn btn-info"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
