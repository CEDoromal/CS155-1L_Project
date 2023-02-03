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
            echo "<script>window.location = '../views/productsmonitor.php'</script>";
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
        //print_r($_SESSION['shoppingCart']);
    }
}

?>

<?php
    require_once ('navbar.php');
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
<?php getNavBar(); ?>

<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getDataMonitors();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['name'], $row['dsc'], $row['price'],$row['img'] ,$row['id'], 'productsmonitor.php');
                }
            ?>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
