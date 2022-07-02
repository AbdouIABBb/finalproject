<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function mailTo($email,$subject,$message){
    require 'vendor/autoload.php';

    $mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'user.user200109@gmail.com';                     
    $mail->Password   = 'loomtjlrblcglumj';                               
    $mail->SMTPSecure = "ssl";           
    $mail->Port       = 465;                                    

    $mail->setFrom('user.user200109@gmail.com','FinalProject');
    $mail->addAddress($email);  
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    return true;
}

function mailToMe($email,$subject,$message,$name){
    require 'vendor/autoload.php';

    $mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'user.user200109@gmail.com';                     
    $mail->Password   = 'loomtjlrblcglumj';                               
    $mail->SMTPSecure = "ssl";           
    $mail->Port       = 465;                                    

    $mail->setFrom($email,$name);
    $mail->addAddress('abdouiabbadene@gmail.com');  
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    return true;
}

