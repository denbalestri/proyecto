<?php
//--------------------------------------------------------------
// Recordar habilitar mi gmail para que permita enviar mails desde php:
// https://www.google.com/settings/security/lesssecureapps
//--------------------------------------------------------------

		
		include "constantes.php";
		require '../lib/PHPMailer/PHPMailerAutoload.php';
		
		function enviar($to_email, $to_name, $asunto, $mensaje, $adjunto){
			
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			
			// CONFIGURACION DE CASILLA			
			$mail = new PHPMailer();		// creo mi objeto de envio de emails
			$mail->isSMTP();				//Usar SMTP			
			//$mail->SMTPDebug = NIVEL_ERROR; //Activar SMTP debugging
			$mail->Debugoutput = 'html';	//Errores mostrados con html			
			$mail->Host = SERVIDOR_EMAIL; 	//Servidor de correo			
			$mail->Port = PUERTO_EMAIL;		//Puerto SMTP			
			$mail->SMTPSecure = 'tls';		// ssl (deprecated) o tls			
			$mail->SMTPAuth = true;			// Con SMTP authentication			
			$mail->Username = USUARIO_EMAIL;//Usuario de gmail (el email completo)			
			$mail->Password = CLAVE_EMAIL;	//Password
			
			// ENVIO DE EMAIL
			$mail->setFrom(FROM_EMAIL, NAME_EMAIL);//Enviado por					
			$mail->addAddress($to_email, $to_name);	//Enviar a			
			$mail->Subject = $asunto;				//Asunto	
			$mail->msgHTML($mensaje);				//Mensaje			
			if($adjunto){
				$mail->addAttachment($adjunto['tmp_name'],$adjunto['name']);			//Adjunto
			}			
		
			if (!$mail->send()) {
				return $mail->ErrorInfo;			
			}
			else{
				return true;
			}
		}
	
