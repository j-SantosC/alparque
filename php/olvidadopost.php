<?php

include "conexion.php";

$usuario = $_POST["usuario"];

$temp_pass = rand(100000,99999);

$tempPassCifrado = password_hash($temp_pass, PASSWORD_DEFAULT);
        
$registrar ="UPDATE usuarios SET password='$tempPassCifrado' WHERE usuario='$usuario'";

mysqli_query($conexion,$registrar);

$sql = "SELECT * FROM usuarios WHERE nombre ='$usuario'";

$resultados=mysqli_query($conexion,$sql);
while($fila=mysqli_fetch_row($resultados)){  

    $emailDestino = $fila[3];

}

$emailDestino;

$asunto = "Recuerar Contraseña alparque";

$texto_mail = "Tu contraseña temporal es la siguiente: ".$temp_pass.". Cambiala desde dentro de la web en Editar Usuario";

$headers= "MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: alparque <info@alparque.es>\r\n";

$exito=mail($emailDestino,$asunto,$texto_mail,$headers);

if($exito){
    echo "Nueva contraseña enviada al email registrado";

}else{
    echo "Ha habido un error al enviar el mensaje";
}

?>