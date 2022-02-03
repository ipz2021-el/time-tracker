<?php
	require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'm.php';
	require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
	require '/usr/share/php/libphp-phpmailer/class.smtp.php';

	$mail = new PHPMailer;
	$mail->setFrom($email);
	$mail->addAddress('ahelperbd@gmail.com');
	$mail->Subject = 'Clocker - reset hasla';
	$mail->Body = "Twoje haslo tymczasowe to: {$this->haslo}";
	$mail->IsSMTP();
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'ssl://poczta.interia.pl';
	$mail->SMTPAuth = true;
	$mail->Port = 465;

	//Set your existing gmail address as user name
	$mail->Username = muser;

	//Set the password of your gmail address here
	$mail->Password = mpass;
	if(!$mail->send()) {
	echo 'Email is not sent.';
	echo 'Email error: ' . $mail->ErrorInfo;
	} else {
	echo 'Email has been sent.';
	}


	class send_email 
	{
		private $email;
  		private $haslo; 

		function __construct($email, $haslo) {
			$this->email = $email;
			$this->haslo = $haslo; 
		}

		function send_mail($email, $haslo) 
		{
			// $msg="";
			if($this->email)
			{
				$from_add = "aplikacjeinternetowe2022@gmail.com"; 
				$to_add = "{$this->email}";
				$subject = "Clocker - reset hasla" ;
				$message = "Twoje haslo tymczasowe to: {$this->haslo}" ;
				$headers = "From: {$from_add} \r\n";
				$headers .= "Reply-To: {$from_add} \r\n";
				$headers .= "Return-Path: {$from_add}\r\n";
				$headers .= "X-Mailer: PHP \r\n";
				
				
				if(mail($to_add,$subject,$message,$headers)) 
				{
					echo "tak";
					return true;
				} 
				else 
				{
					echo "nie";
					return false;
				}
			}
		}
	}
?>