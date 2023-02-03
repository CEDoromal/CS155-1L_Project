<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mandatechmnl@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'xgprlmgwasajbqum'; // 'mandaphilippines'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('mandatechmnl@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('mandatechmnl@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Client Message';
    $mail->Body = "<p>From : $name <br>Email: $email <br>Message : $message</p>";

    $mail->send();
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Message sent! Thank you for contacting us.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  } catch (Exception $e){
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$e->getMessage().'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function () {
        
            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
        
        });
        </script>