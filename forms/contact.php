<?php
  
  // Replace contact@example.com with your real receiving email address
$receiving_email_address = 'omar.khuatbek@gmail.com';

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHPMailer(true);
  
  $contact->isSMTP();
  $contact->SMTPAuth = true;
  // $contact->Host = "smtp.gmail.com";

  //Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'omar.khuatbek@gmail.com',
    'password' => 'fscu lras jzlz fewf',
    'port' => '587',
  );
  

  $contact->add_message( $name, 'From');
  $contact->add_message( $email, 'Email');
  $contact->add_message( $message, 'Message', 10);

  echo $contact->send();
?>
