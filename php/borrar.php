<?php

    include "conexion.php";

    $id = $_GET['id'];

    $consulta ="DELETE FROM mascotas WHERE id= $id";
    mysqli_query($conexion, $consulta);
    header("Location:mascotas.php");


?>