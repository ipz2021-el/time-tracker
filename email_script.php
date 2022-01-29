<?php
	class send_email 
	{
		function send_email($email, $haslo) 
		{
			$msg="";
			if($email)
			{

				$from_add = "aplikacjeinternetowe2022@gmail.com"; 

				$to_add = '$email)';

				$subject = "Clocker - reset hasla" ;
				$message = "Twoje haslo tymczasowe to: $haslo" ;
				
				$headers = "From: $from_add \r\n";
				$headers .= "Reply-To: $from_add \r\n";
				$headers .= "Return-Path: $from_add\r\n";
				$headers .= "X-Mailer: PHP \r\n";
				
				
				if(mail($to_add,$subject,$message,$headers)) 
				{
					return true;
				} 
				else 
				{
					return false;
				}
			}
		}
	}
?>