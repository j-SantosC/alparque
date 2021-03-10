
<?php

include "conexion.php";

    $nombre= $_POST["nombre"];
    $direccion= $_POST["direccion"];
    $ciudad= $_POST["ciudad"];

    $registrar ="INSERT INTO parques (nombre,direccion,ciudad)
                 VALUES ('$nombre','$direccion','$ciudad')";
    
 mysqli_query($conexion,$registrar);

 header("Location:inicio.php");

?>