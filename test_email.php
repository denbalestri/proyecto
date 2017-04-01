<?php
	
	include "funciones_email.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim($_POST["name"]); //con trim quito los espacio que pudiera tener adelante y atras la cadena enviada.
	$email = trim($_POST["email"]);
	$message = trim($_POST["message"]);
	
	$email_body = "";
        $email_body = $email_body. "Nombre: " . $name . "<br>";
        $email_body = $email_body. "Email: " . $email . "<br>";
        $email_body = $email_body. "Mensaje: " . $message;
		
		$resultado = enviar($email, $name, "test", $email_body, $_FILES['miattachment']);
		
		echo $resultado; exit;
		

}
?>
<html>
    <head>
        <title>Email con adjunto</title>
    </head>
    <body>       
                                                                                                                                     
		<form method ="POST" action ="" enctype='multipart/form-data'>
			<input type ="text" name="name" id ="name" placeholder="Nombre" value="">    <br>                                       
			<input type ="text" name="email" id ="email" placeholder="Email" value="">   <br>    
			<textarea name ="message" id ="message" placeholder="Mensaje" rows = "10" ></textarea>  <br>    
			<input type ="file" name='miattachment' id='uploaded_file'> <br>    
			<input type ="text" name="address" id="address">   <br>    
			<button type="submit" >Enviar</button> <br>    
		</form>                        
            
    </body>
</html>