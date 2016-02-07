<?php
    /*
	Author: Shahid Shaikh
	Blog  : http://codeforgeek.com
    */
    require_once('class.phpmailer.php');
    require_once('class.smtp.php');
    function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->Host       = "smtp.gmail.com";                  
                  $mail->SMTPAuth   = true;
                  $mail->Host       = "smtp.gmail.com";
                  $mail->Port       = 587;
                  $mail->Username   = "myEmailAddress";
                  $mail->Password   = "myPassword";
                  $mail->SMTPSecure = 'tls';
                  $mail->SetFrom('myEmailAddress', 'myName');
                  $mail->AddReplyTo("myEmailAddress","myName");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                  }
    }
?>