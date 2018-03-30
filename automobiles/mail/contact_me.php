<?php

include "database.php";
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
$column=array(
    "name"=>$name,
    "email_id"=>$email,
    "contact_no"=>$phone,
    "message"=>$message,
    );
var_dump($column);
$dbb->insert("contact_form",$column);
// Create the email and send the message
include_once("./PHPMailer_v5.1/index.php");
$new_mail= new MyMail();
$fromemail="Admin";
$fromname="Flydex Automobiles";
$tomail=$email;
$toname=$name;
$replytoemail="admin@flydexautomobiles.com";
$replytoname="admin";
$subject = "Flydex Automobiles - Thank you for your valuable Time";
$body    = "<h2><center>Flydex Automobiles</center></h2><p>Dear $toname, <br>Thank you for your valuable Time.<br>We are looking to establish a better customer relationship  because of,<br><h1>“Money can't buy one of the most important things you need to promote your business: Relationships.”</h1> 
<br>Not only Business to customer (B2C) relationship, this company is looking forward to develope Business to Business (B2B) relationship in upcoming days.</p><p><b>JAI MATA DI</b></p>
    ";
$altBody = "Flydex Automobiles\nThank you for your valuable Time.<br>You can Contact us further .We will try to act on this query as soon as possible.\nJAI MATA DI";

$new_mail->sendMail($fromemail, $fromname,$tomail, $toname,$replytoemail, $replytoname,$subject,$body,$altBody);

return true;         
?>

