<?php

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
require 'vendor/autoload.php';

include('connect.php');
include('check.php');



$subject = $_POST['subject'];
$message = $_POST['message'];
$email2= $_POST['email'];
$email3 = 'p.match.umass@gmail.com';
$contacter = $_POST['name'];
$mail = new PHPMailer\PHPMailer\PHPMailer();
$user = 'Admin';

try {
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.qq.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "345943193@qq.com";                     // SMTP username
    $mail->Password   = "rfqqnmnzwqjzbhaj";                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to
    

    //Recipients
    $mail->setFrom("345943193@qq.com", "Contacter:$contacter email: $email2");
    $mail->addAddress("$email3", '$user');
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$message";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    if ($mail->ErrorInfo <> ''){
        
		echo "<script>alert('Sorry, errormassage!'); history.go(-1);</script>";  
		die;
    }else{
        echo "<script>alert('Thank you for your valuable feedback.'); window.location.href='index.php'</script>";  
		
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}