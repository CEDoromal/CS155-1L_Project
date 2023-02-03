<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$contactnum = $_POST['contactnum'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	//$role = $_POST['role'];
    $role = '2';

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, firstname, lastname, contactnum, email, password, role)
					VALUES ('$username', '$firstname', '$lastname', '$contactnum','$email', '$password', '$role')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$_SESSION['status'] = "Registration complete";
				$username = "";
				$firstname = "";
				$lastname = "";
				$contactnum = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$role = "";
			} else {
                $_SESSION['status2'] = "Something went wrong";
			}
		} else {
			$_SESSION['status2'] = "Username already exists";
		}
		
	} else {
        $_SESSION['status2'] = "Password not matched";
	}
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
        <link href="../css/styles.css" rel="stylesheet" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #111B4A;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h1 class="fw my-4 text-center">Create Account</h1></div>
                                    <div class="card-body">

                                    <?php 
                                if(isset($_SESSION['status']))
                                {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['status']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php 
                                unset($_SESSION['status']);
                                }
                            ?>

                            <?php 
                                if(isset($_SESSION['status2']))
                                {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['status2']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php 
                                unset($_SESSION['status2']);
                                }
                            ?>
                                        <!-- Registration form-->
                                        <form method="POST">
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control" id="usernme" type="text" placeholder="Enter username" name="username" value="<?php echo $username; ?>" required>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (first name)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" name="firstname" value="<?php echo $firstname; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (last name)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" name="lastname" value="<?php echo $lastname; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Group (contact number)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Contact Number</label>
                                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter contact number" name="contactnum" value="<?php echo $contactnum; ?>" required>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" value="<?php echo $email; ?>" required>
                                            </div>
                                            <!-- Form Row    -->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Enter password" name="password" value="<?php echo $_POST['password']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- form group (role)
                                            <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Role</label>
                                            <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                <option selected disabled value="null">----Select Role----</option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
                                            </div> -->
                                            <!-- Form Group (create account submit)-->
                                            <button class="btn btn-dark btn-block float-end" name="submit">Create Account</button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
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
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function () {
        
            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
        
        });
        </script>
    </body>
</html>
