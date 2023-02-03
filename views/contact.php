<?php include 'sendemail.php'; ?>

<?php
    require_once ('navbar.php');
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
        <link href="../css/styles.css" rel="stylesheet" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed" style="background-color: #111B4A;">
    <?php getNavBar(); ?>
        <main>

                    <!-- Main page content-->
                    <br><br> <div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-dark">Socials</div>
                                    <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-2"><i class="text-black-50" data-feather="phone"></i></div>
                                        0961 998 0154
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-2"><i class="text-black-50" data-feather="globe"></i></div>
                                        https://mandatech.business.site
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-2"><i class="text-black-50" data-feather="mail"></i></div>
                                        mandatech98@gmail.com
                                    </div>
                                <hr class="mt-2 mb-4" />
                                <div class="text-center">
                                        <a class="btn btn-icon btn-sm btn-success mx-1" href="https://wa.me/9619980154"><i class="fab fa-whatsapp fa-fw fa-sm"></i></a>
                                        <a class="btn btn-icon btn-sm btn-red mx-1" href="https://www.youtube.com/channel/UC8IGX6eQi3YIsFcOWs5KexA"><i class="fab fa-youtube fa-fw fa-sm"></i></a>
                                        <a class="btn btn-icon btn-sm btn-pink mx-1" href="https://www.twitter.com/mandatechPH"><i class="fab fa-instagram fa-fw fa-sm"></i></a>
                                        <a class="btn btn-icon btn-sm btn-twitter mx-1" href="https://www.instagram.com/mandatechph"><i class="fab fa-twitter fa-fw fa-sm text-white"></i></a>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header text-dark">Contact Us</div>
                                    <div class="card-body">
                                        <!--alert messages start-->
                                        <?php echo $alert; ?>
                                        <!--alert messages end-->
                                        <form class="contact" action="" method="post">
                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control" name="email" id="email" type="text" placeholder="Enter email" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="name">Full Name</label>
                                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter name" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="message">Message</label>
                                                <div class="mb-0">
                                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Enter message" required></textarea></div>

                                                </div>

                                            <!-- Save changes button-->
                                            <input class="btn btn-dark float-end" name="submit" type="submit"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
        <script type="text/javascript">
            if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
