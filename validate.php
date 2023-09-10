<?php  

	if(isset($_POST['register'])){

    if(!isset($_SESSION))
		session_start();

	include('connection.php');
		
    $username = mysqli_real_escape_string($conn,trim($_POST['username']));
    $mobile_number = mysqli_real_escape_string($conn,trim($_POST['mobile_number']));
    $email_address = mysqli_real_escape_string($conn,trim($_POST['email_address']));
    $password = mysqli_real_escape_string($conn,trim($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn,trim($_POST['confirm_password']));
		
    if($password == $confirm_password){
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email_address)){
            if(preg_match("/^(\+?\d{1,4})?[-.\s]?(\()?(\d{1,3})(?(2)\))[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/", $mobile_number)){

                $sql_email = "SELECT email_address FROM user WHERE email_address='$email_address'";
                $result_email = mysqli_query($conn,$sql_email);

                $sql_mobile = "SELECT mobile_number FROM user WHERE mobile_number='$mobile_number'";
                $result_mobile = mysqli_query($conn,$sql_mobile);

                if(mysqli_num_rows($result_email)>0){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","Email Address '. $email_address.' is already exists!","error");';
                    echo '}, 500);</script>';
                }
                else if(mysqli_num_rows($result_mobile)>0){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","Mobile number '.$mobile_number.' is already exists!","error");';
                    echo '}, 500);</script>';
                }else{
                        $activation_code = hash('sha256',mt_rand(0,1000));
                        $hash_password = md5($password);   

                        $sql = "INSERT INTO user (`username`,`password`,`mobile_number`,`email_address`,`activation_code`) VALUES('$username','$hash_password','$mobile_number','$email_address','$activation_code')";

                        $result = mysqli_query($conn,$sql);

                        if(!$result)
                            die("Error while updating!!!...").mysqli_error($conn);
                        else{
                                $_SESSION['username']=$username;	
                                $_SESSION['mobile_number']=$mobile_number;	
                                $_SESSION['email_address']=$email_address;	
                                $_SESSION['password']=$password;
                                $_SESSION['activation_code']=$activation_code;

                                include('activate_email.php');
                            }
                    }
            }else{
                    //invalid mobile number error message
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","Mobile number '. $mobile_number.' is invalid!","error");';
                    echo '}, 500);</script>';
                }
        }else{
                //email address invalid error messaage
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Oops...","Email address '. $email_address.' is invalid!","error");';
                echo '}, 500);</script>';
        }
    }else{
            //password does not match error 
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops...","The two passwords does not match!","error");';
            echo '}, 500);</script>';
        }
}

if(isset($_POST['login'])){

    session_start();

    include('connection.php');

    $email_address = mysqli_real_escape_string($conn,$_POST['email_address']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $hash_password = md5($password);

    $sql = "SELECT * FROM user WHERE email_address = '$email_address' AND password = '$hash_password' ";

    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("Warning...","Error while loggin in!..","warning");';
        echo '}, 500);</script>';
    }
    else
    {
        $row=mysqli_fetch_array($result);
        $username = $row['username'];
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            if($row['confirm_status']==0)
            {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Warning...","Please activate your account first!..","warning");';
                echo '}, 500);</script>';
            }else{
                    if($row['email_address'] == 'admin@gmail.com' && $row['password'] == 'c12b240b5710c6c9ee00ef4529803aac'){
                        $_SESSION['username']=$username;
                        $_SESSION['email_address'] = $email_address;
                        header('location:admin_page.php');
                    }else{
                        $_SESSION['username']=$username;
                        $_SESSION['email_address'] = $email_address;
                        header('location:profile.php');
                    }
                }
        }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Oops...","Wrong username or Password!...","error");';
                echo '}, 500);</script>';
            }
        }
    }

if(isset($_POST['forgot'])){

    session_start();

    include('connection.php');

    $email_address = mysqli_real_escape_string($conn,$_POST['email_address']);
    $sql = "SELECT email_address FROM user WHERE email_address = '$email_address' ";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==0){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("Oops...","Email address '. $email_address.' does not exists!","error");';
        echo '}, 500);</script>';
    }else{
        require 'phpmailer/PHPMailerAutoload.php';

        $_SESSION['email_address'] = $email_address;

        $sql = "SELECT username FROM user WHERE email_address = '$email_address' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $username = $row['username'];

        $_SESSION['username'] = $username;
    
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'your email address';                 // SMTP username
        $mail->Password = 'smtp password';                         // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $to=$email_address;
        $mail->setFrom('your email address', 'Musical World');
        $mail->addAddress($to);     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Reset Your Account';
        $mail->Body = "
        <br><br>
        <b>Hello,".$username.",</b><br>
        You recently requested to reset your password for your Musical World account.Click the button below to reset it. <br>
        <br><br>
        
        <button type='button' class='btn btn-secondary'><a href='http://localhost/musical_world/reset_password.php'>Reset Password</a></button>

        <br><br>

        If you did not requested to reset your password please ignore this email or reply to let us know.<br><br>
        <pre>Thanks,
        <b>Musical World</b></pre>";

        if(!$mail->send()){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops..."," Error while sending email.Please check your your internet coonection!","error");';
            echo '}, 500);</script>';
        }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Success","A link have been sent to your email aadress '.$to.' Please reset your Password by pressing the link.","success");';
                echo '}, 500);</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="KEERTHANA KUTEERA LOGO-BLACK-01.png" type="image/png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
    </body>
</html>