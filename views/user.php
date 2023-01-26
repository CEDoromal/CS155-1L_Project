<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

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
        <link href="../css/styles.css" rel="stylesheet" /> <!-- css for whole page -->
        <link href="../css/indexcss.css" rel="stylesheet" /> <!-- css for whole page -->
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
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
            <!-- Main page content-->
            <br><br>

              <div class="welcome-admin2">
                <br>
                <?php echo "<div class=\"welcome-admin\">Welcome " . $_SESSION['username'] . "</div>"; ?>
              </div>
              <div class="lg">
              <a class="btn btn-dark btn-sm" type="button" href="logout.php">Logout</a>
              </div>
              <br>
              <div class="cart">
              <a class="btn btn-dark btn-sm" type="button" href="cart.php">Cart</a>
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
    </body>
</html>
