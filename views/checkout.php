<?php

session_start();

require_once ("../php/order_operation.php");
require_once ('getdatabase.php');
require_once ('component.php');

$db = new CreateDb("mandatech", "products");

?>

<?php
    require_once ('navbar.php');
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
<?php getNavBar(); ?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
            <h6>Billing Details</h6>
                <hr>
                <form method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Billing address</label>
    <div class="col-sm-10">
      <input type="text" name="badd" class="form-control" placeholder="BIlling Address" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Shipping Address</label>
    <div class="col-sm-10">
      <input type="text" name="sadd" class="form-control" placeholder="Shipping Address" required>
    </div>
  </div>
  <!--
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Payment Methods</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            Cash on Delivery
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Credit Card/Debit Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" >
          <label class="form-check-label" for="gridRadios3">
            Gcash
          </label>
         </div>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option2">
          <label class="form-check-label" for="gridRadios4">
            BillEase
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  -->
  <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input invisible" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">

        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
    <input type="submit" name="checkoutButton" class="btn btn-info" value="Checkout">
    </div>
  </div>
</form>
<span>
  <?php
    echo '';
    if(isset($_SESSION['shoppingCart']) && isset($_POST['checkoutButton']) && isset($_POST['badd']) && isset($_POST['sadd']) && isset($_SESSION['shoppingCart']) && isset($_SESSION['username']) && isset($_SESSION['userID'])) {  
      $total = 0;
      $products = '';    
      
      $product_id = array_column($_SESSION['shoppingCart'], 'id');
    
      $result = $db->getDataAllProducts();
      while ($row = mysqli_fetch_assoc($result)){
          foreach ($product_id as $id){
              if ($row['id'] == $id){
                  $total = $total + (int)$row['price'];
                  $products = $products . ', ' . $row['name'];
              }
          }
      }
    
      $price = strval($total);
    
      createData($_SESSION['userID'], $_SESSION['username'], $_POST['badd'], $_POST['sadd'], $products, $price);

      //bandage fix
      echo '<script> alert("Order Recieved! Check your email for confirmation.") </script>';
      unset($_SESSION['shoppingCart']);
      //header("Location: ../index.php");
      echo "<script>alert('Order Recieved! Check your email for confirmation.'); window.location = '../index.php'</script>";

    } elseif(isset($_SESSION['checkoutButton'])) {
      echo 'Error';
    }
    ?>
</span>
</div>
</div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>Order Details</h6>
                <hr>
                <?php
                                $total = 0;
                                if (isset($_SESSION['shoppingCart'])){
                                    $product_id = array_column($_SESSION['shoppingCart'], 'id');

                                    $result = $db->getDataAllProducts();
                                    while ($row = mysqli_fetch_assoc($result)){
                                        foreach ($product_id as $id){
                                            if ($row['id'] == $id){
                                                $total = $total + (int)$row['price'];
                                            }
                                        }
                                    }
                                }else{
                                    echo "<h5>Cart is Empty</h5>";
                                }
                ?>
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
