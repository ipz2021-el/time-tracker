<?php
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