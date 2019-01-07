<?php

header('Content-Type: text/html; charset=utf-8');


include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$name = stripslashes($_POST['name']);

$email = trim($_POST['email']);
$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);
//$message = utf8_encode(stripslashes($_POST['message']));

$error = '';



if(!$error)
{
		$mail = mail(WEBMASTER_EMAIL,$subject,$message,     
		"From: ".$name." <".$email.">\r\n"     
		."Reply-To: ".$email."\r\n"       
		."Content-type: text/html; charset=UTF-8\r\n"      
		."X-Mailer: PHP/" . phpversion());


if($mail)
{
	echo 'ВАШЕТО ЗАПИТВАНЕ Е ИЗПРАТЕНО, БЛАГОДАРИМ ВИ!';
}

}


}
?>