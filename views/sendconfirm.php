<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
require_once '../php/order_operation.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['checkoutButton'])){

  $orderID = strval(setID()+1);

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mandatechmnl@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'xgprlmgwasajbqum'; // 'mandaphilippines'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('mandatechmnl@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($_SESSION['userEmail']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Client Message';
    $mail->Body = "<p>Thank you for purchasing at Mandatech!<br>Your Order ID is $orderID.<br>If you have any concerns or inquiries about your purchase, please feel free to contact us with the Order ID provided.</p>";

    $mail->send();
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