<?php
include_once('/inc/phpMailer/class.phpmailer.php');
if(!isset($isIndex))die('');
else
{
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
	{
		$name=clean($_POST['name']);
		$email=clean($_POST['email']);
		$message=clean($_POST['message']);

		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->Host = SMTP_HOST;
		$mail->Port = SMTP_PORT;
		$mail->CharSet = 'utf-8'; 
		$mail->SMTPAuth = true;
		$mail->Username = SMTP_USER;
		$mail->Password = SMTP_PWD;
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp";
		$mail->SMTPDebug = 0;
		$mail->SMTPSecure = 'tls';
		$mail->From = $email;
		$mail->FromName = $name;
		$mail->AddAddress(DB::getParam('email',$mysqlC));
		$mail->IsHTML(false);
		$mail->Subject = "nouveau message";
		$mail->Body    = $message;
		if($mail->Send())
		{
			echo "all is well";
			timedRedirect('/');
		}
		else
		{
			echo "problem occured";
			timedRedirect('/contact');
		}
	}
}
?>