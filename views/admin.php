<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../php/component.php");
require_once ("../php/operation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link href="../css/styles.css" rel="stylesheet" /> <!-- css for whole page -->
    <link href="../css/indexcss.css" rel="stylesheet" /> <!-- css for whole page -->
    <link rel="../css/stylesheet" href="style.css">

</head>
<br><br><br>
<body class="nav-fixed" style="background-color: #111B4A;">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="../index.php">MANDATECH</a>
        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item no-caret d-none d-md-block me-3">
        <a class="nav-link active" href="../index.php">
                    <div class="fw-500">Home</div>
        </a>
        </li>
        </ul>
    </nav>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded">
          <div class="welcome-admin2">
            <br>
            <?php echo "<div class=\"welcome-admin\">Welcome " . $_SESSION['username'] . "</div>"; ?>
          </div>
          <div class="lg">
          <a class="btn btn-dark btn-sm" type="button" href="logout.php">Logout</a>
          </div>
        </h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "id",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Product Name", "name",""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Type", "type",""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Description", "dsc",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "price",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Quantity", "quantity",""); ?>
                    </div>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Image Reference", "img",""); ?>
                </div>
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['type']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['dsc']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['price']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['quantity']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['img']; ?></td>
                                   <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>


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
<script src="../js/scripts.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../php/main.js"></script>


</body>
</html>
