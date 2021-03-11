<?php

include "conexion.php";

$usuario = $_POST["usuario"];
$emailDestino;
$asunto = "Recuerar Contraseña alparque";

$sql = "SELECT * FROM usuarios WHERE nombre ='$usuario'";

$resultados=mysqli_query($conexion,$sql);
while($fila=mysqli_fetch_row($resultados)){  

    $emailDestino = $fila[3];

}
$texto_mail = "Haz Click en el siguiente enlace: www.alparque.es/php/recuperarContra?usu=". $usuario;

$headers= "MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: Prueba Juan <info@alparque.es>\r\n";

$exito=mail($emailDestino,$asunto,$texto_mail,$headers);

if($exito){
    echo " Mensaje con exito";
}else{
    echo "Ha habido un error";
}

?>