<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$btn_submit=$_POST['btn-submit'];
$email=$_POST['email'];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

if(isset($btn_submit)){
    if(!empty($email)){
 
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;                               
            $mail->Username = 'maricaneston38@gmail.com';                 
            $mail->Password = 'Cod3blackmarica';                          
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                    
        
            //Recipients
            $mail->setFrom('maricaneston38@gmail.com', 'Bongobespoke');
            $mail->addAddress($email);    
            $mail->addReplyTo('maricaneston38@gmail.com', 'Information');
            
            
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Bongobespoke Subscription';
            $mail->Body    = 'Thank you for subscribing with us, you will receive 
            various offers before hand!</b>';
            $mail->AltBody = 'Thank you for subscribing with us, you will receive 
            various offers before hand!';
        
        
            //check if email is sent or not
            if($mail->send()){
                echo '<script type="text/javascript">'; 
                echo 'alert("Email has be submitted");'; 
                echo 'window.location.href = "index.html";';
                echo '</script>';    
            }else{
                echo '<script type="text/javascript">'; 
                echo 'alert("Please retry again");'; 
                echo 'window.location.href = "index.html";';
                echo '</script>';        
            }
            
        } catch (Exception $e) {
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Server error please retry");'; 
            echo 'window.location.href = "index.html";';
            echo '</script>';    
        }
            
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Input your email and try again");'; 
        echo 'window.location.href = "index.html";';
        echo '</script>';
    }
    
}