<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['name'])){
        
	    $name=$_POST['name'];
	    $email=$_POST['email'];
	    $message=$_POST['message'];

 		require_once('phpMailer/src/PHPMailer.php'); 
		require_once ('phpMailer/src/SMTP.php');
		require_once ('phpMailer/src/Exception.php');
 					
 		date_default_timezone_set("America/Argentina/Buenos_Aires");

		$mail = new PHPMailer;
	    
	    //Server settings
	    $mail->isSMTP();
	    $mail->Host = 'mail.paideiastudio.com.ar';
	    $mail->SMTPAuth = true;  
	    $mail->Username = 'contact@paideiastudio.com.ar';
	    $mail->Password = 'Mpl53/0555';
	    $mail->SMTPSecure = 'tls';   
	    $mail->Timeout       =   10; 

    	$mail->Port = 587;

		$mail->CharSet = 'UTF-8';

		$mail->setFrom('contact@paideiastudio.com.ar',  'Contacto WEB');

		$mail->addAddress('paideiacreativestudio@gmail.com');

	    $subject = "Formulario de contacto - Paideiastudio";
	
	    //$message = " Nombre: " . $name ."\r\n E-mail: " . $email . "\r\n Mensaje:\r\n" . $message;
	    
	    $messageHTML = " Nombre: " . $name ."<br>E-mail: " . $email . "<br>Mensaje:" . $message;
	    
	    $mail->IsHTML(true);
	 	$mail->Subject =  $subject	;
        $mail->Body    = $messageHTML	;
        //$mail->AltBody = $message;

		$envio = $mail->Send();


		if ($envio) {

			echo 1;
		}else{
			echo "error";

		}


}

?>