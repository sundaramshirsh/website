<?php

/**
* This class is responsible for sending any kind of email to the server
*/
class MyMail
{
	private $mail;
	
	function __construct()
	{
		require("class.phpmailer.php");
		$this->mail = new PHPMailer();
		$this->mail->IsSMTP();                                      // set mailer to use SMTP
		$this->mail->Host = "email-smtp.us-west-2.amazonaws.com";  // specify main and backup server
		$this->mail->SMTPAuth = true;     // turn on SMTP authentication
		$this->mail->SMTPSecure = 'ssl';
		$this->mail->Port = 465;
		$this->mail->Username = "AKIAJC7KQ6LZBI2UVZPQ";  // SMTP username
		$this->mail->Password = "Ar2PKAs1zsLhZsYIp2cyF9mldgYgBGiTLFnx/fuca/od"; // SMTP password
	}

	function sendMail($fromEmail, $fromName,$toMail, $toName,$replyToEmail, $replyToName,$subject,$body,$altBody)
	{

		$this->mail->From = $fromEmail."@flydexautomobiles.com";
		$this->mail->FromName = $fromName;
		$this->mail->AddAddress($toMail, $toName);
		
		//$this->mail->AddAddress("ellen@example.com");                  // name is optional
		$this->mail->AddReplyTo($replyToEmail, $replyToName);

		$this->mail->WordWrap = 500;                                 // set word wrap to 50 characters
		//$this->mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
		//$this->mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
		$this->mail->IsHTML(true);                                  // set email format to HTML

		$this->mail->Subject = $subject;
		$this->mail->Body    = $body;
		$this->mail->AltBody = $altBody;

		if(!$this->mail->Send())
		{
		   return true;
		}

		return false;
	}

	function mailYatriFeedback($complaintId,$toMail,$toName)
	{
		$subject = "Flydex Automobiles - Thank you for your valuable Time";
		$body    = "<h2><center>Flydex Automobiles</center></h2><p>Dear $toName, <br>Thank you for your valuable Time.<br>We are looking to establish a better customer relationship  because of,<br><h1>“Money can't buy one of the most important things you need to promote your business: Relationships.”</h1> 
<br>Not only Business to customer (B2C) relationship, this company is looking forward to develope Business to Business (B2B) relationship in upcoming days.</p><p><b>JAI MATA DI</b></p>
		";
		$altBody = "Flydex Automobiles\nThank you for your valuable Time.<br>Your FeedBack ID is : $complaintId .You can Contact us further with this as reference id.We will try to act on this query as soon as possible.\nJAI MATA DI";
		
		$this->sendMail("admin","Admin",$toMail,$toName,"admin@flydexautomobiles.com","Admin",$subject,$body,$altBody);
	}

}


?>

