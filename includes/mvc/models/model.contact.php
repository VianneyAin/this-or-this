<?php
  class Contact_Model {
    public function __construct() {

    }

    public function send_message($email, $message){
         $to      = 'contact.thisorthis@gmail.com';
         $subject = 'Contact Form Submission';
         $message = "From ".$email.' : '.$message;
         $headers = 'From: ' .$email. "\r\n" .
         'Reply-To: ontact.thisorthis@gmail.com' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();

         mail($to, $subject, $message, $headers);
    }
  }
?>
