
<?php

include "conexion.php";


    $nombre= $_POST["nombre"];
    $repetida = false;

    $query= " SELECT * FROM  ciudades";
                        
    $resultados=mysqli_query($conexion,$query);
    while($fila=mysqli_fetch_row($resultados)){ 
     
        if($fila[1]==$nombre){

            $repetida = true;
        }
        
    } 

    if($repetida == false){

        $registrar ="INSERT INTO ciudades (nombre)
        VALUES ('$nombre')";

        mysqli_query($conexion,$registrar);

        header("Location:newpark.php");
    } else {
        header("Location:newpark.php");

    }

 

?>