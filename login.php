<?php
include "elementos_html.php";
  

if(isset($_POST["usuario"])){
include "constantes.php"; 
$cnx = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
    $usuario=$_POST["usuario"];
    $email=$_POST["email"];
    $clave1=$_POST["clave"];
    $clave2=$_POST["clave2"];
    $error="";
    if(empty($usuario)){
        $error.="<p>El usuario no puede quedar vacia</p>";

}
if(empty($mail)){

       $error.="<p>El mail no puede quedar vacia</p>";
}

   
    if($clave2==$clave1 && $error==""){
         
    $query="INSERT INTO usuarios(nombre,clave,email,token,activo) VALUES ('$usuario','$clave1','$email','','0' ) ";
    $respuesta=mysqli_query($cnx,$query);
    echo $respuesta;
}

   
    else{
        echo "ingreso mal la contraseña,ingrese nuevamente";
    }
    
}


?>
<html>
    <head>
    <?=$estilos_scripts;?>
        <title>Proyecto</title>
    </head>
    <body>
        <?=$encabezado;?>
        <div>
        <form method ="POST" action ="" enctype='multipart/form-data'>
        <br>
        <br>
        <h1>LOGIN</h1>
        <label>Usuario:</label>
            <input type ="text" name="usuario"  placeholder="Usuario" value="">    <br> 
               <label>Mail:</label>                                   
            <input type ="text" name="email"  placeholder="Email" value="">   <br>  
            <label>Ingrese su clave:</label>  
            <input type ="password" name="clave"  placeholder="Clave" value="">   <br>
            <label>Ingrese su clave nuevamente:</label>
            <input type ="password" name="clave2" placeholder="Reingresar la clave" value="">   <br>
            <button type="submit" >Enviar</button> <br> 
            <?=$error;?>   
        </form>    
            
        </div>
        <?=$pie_pagina?>
    </body>
</html>