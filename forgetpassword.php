<?php
include('connect.php');
require_once('vendor/autoload.php');






//$newpassword = md5(uniqid());
$newpassword = uniqid();
$user = isset($_POST['user'])? $_POST['user'] : ''; 
$email2 = isset($_POST['email2'])? $_POST['email2'] : ''; 

$hit = isset($_POST['hit'])? $_POST['hit'] : '';

if( !empty($user) && !empty($email2) && !empty($hit)){

    $sql = "select * from account where user='{$user}' and email2='{$email2}' and hit='{$hit}'";
    $mysqli_result = $db-> query($sql);
    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
    
    
    
   
    if ( is_array($row)) {   
        $sql = "update account set pwd = '{$newpassword}' where user = '{$user}' ";
        $is = $db->query($sql);

       
    }else{
       
       // header('location: trans_reset_fail.php');
       // die('Username or Email is not correct!');
       echo "<script>alert('Username or Email is not correct!'); history.go(-1);</script>";  
       die;
    }
        ////////////////// email part
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
require 'vendor/autoload.php';



$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.qq.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "345943193@qq.com";                     // SMTP username
    $mail->Password   = "rfqqnmnzwqjzbhaj";                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom("345943193@qq.com", "User: $user");
    $mail->addAddress("$email2", '$user');     // Add a recipient
    $mail->addReplyTo('345943193@qq.com', 'info'); 
    //
    //
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "P-match password reset";
    $mail->Body    = "Hello $user! <br> Here is your new passwords $newpassword";
    

    $mail->send();

    if ($mail->ErrorInfo <> ''){
        echo "<script>alert('User name is not exists'); history.go(-1);</script>";  
    }else{
        echo "<script>alert('Success！'); window.location.href='index.php'</script>";
        // echo "New password has sent to your email $email2";
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    exit();
}
       






      



?>