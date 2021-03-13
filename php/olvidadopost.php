<?php

include "conexion.php";

$emailDestino = $_POST["email"];

$temp_pass = rand(10000,99999);

$tempPassCifrado = password_hash($temp_pass, PASSWORD_DEFAULT);
        
$registrar ="UPDATE usuarios SET password='$tempPassCifrado' WHERE email='$emailDestino'";

mysqli_query($conexion,$registrar);


$asunto = "Recuerar Contraseña alparque";

$texto_mail = "Tu Password temporal es el siguiente: ".$temp_pass.".\n Cambialo desde dentro de la web en Editar Usuario";

$headers= "MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: alparque <info@alparque.es>\r\n";

$exito=mail($emailDestino,$asunto,$texto_mail,$headers);

if($exito){
    header("Location:../html/login.html");

}else{
    header("Location:erroralenviar.php");
}

?>