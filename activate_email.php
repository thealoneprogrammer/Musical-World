<?php

	if(!isset($_SESSION['email_address']))
		header('location:index.php');

	if(!isset($_SESSION)){ 
	  session_start(); 
	} 

	require 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'your email address';                 // SMTP username
	$mail->Password = 'smtp password';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$to=$_SESSION['email_address'];
	$mail->setFrom('your email address', 'Musical World');
	$mail->addAddress($to);     // Add a recipient

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Account Confirmation Message';
	$mail->Body = "	 Thank You ".$_SESSION['username']. " for signing up!
	Your account has been created, you can login with the following credentials after you have activated <br> your account by pressing the url below.
	 
	------------------------<br><br><br><br>
	Username:" .$_SESSION['email_address']."<br>
	Password:" .$_SESSION['password']."<br><br><br><br>
	------------------------
	 
	Please click this link to activate your account:----------------------<br><br><br><br>
	http://localhost/musical_world/verify.php?email_address=".$_SESSION['email_address']."&activation_code=".$_SESSION['activation_code']."  "; // Our message above including the link

	if(!$mail->send()){
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Success","<b> Thank you '. $username .' you have successfully registered.A confirmation link has been sent to your email address '. $email_address .' Please activate your account by clicking the activation link!!!...</b>","success");';
            echo '}, 500);</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/KEERTHANA KUTEERA LOGO-ICON-01.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</head>
<body>

</body>
</html>