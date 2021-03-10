<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Likes</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/styles.css">
   

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

</head>
<body>
<div class="container mt-3">
<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}
include "botones.php";
include "conexion.php";

$session=$_SESSION["usuario"];

?>
</div>
        <div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row ">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Perfil</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>

<div class="row">
    <div class="col mx-3">
        <table class="table table-light table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dueño</th>
                <th scope="col">Parque</th>
                <th scope="col">Hora</th>
                </tr>
            </thead>
            
            <?php 
            echo '<tbody>';
                    
                    //Obteniendo los Likes del usuario logeado

                    $query ="SELECT * FROM likes WHERE autor = '$session'";
                    $resultadosLikes=mysqli_query($conexion,$query);
                    while($filaLikes=mysqli_fetch_row($resultadosLikes)){  
                        
                        //Obteniendo las mascotas que le gustan al usuario logeado

                        $query2 ="SELECT * FROM mascotas WHERE id = '$filaLikes[1]'";
                        $resultados=mysqli_query($conexion,$query2);
                        while($fila=mysqli_fetch_row($resultados)){
                            echo'<tr>';
                                echo '
                                    <td><i class="fas fa-heart"></i></td>
                                    <td><a href="perfil.php?id='.$fila[0].'">'.$fila[1].'</a></td>
                                    <td>'.$fila[7].'</td>';
                                
                                    if($fila[9]==date("Y/m/d")){

                                        //Obteniendo el parque en el que esta la mascota que me gusta

                                        $query3 ="SELECT * FROM parques WHERE id = '$fila[8]'";
                                        $resultadosPark=mysqli_query($conexion,$query3);
                                        while($filaPark=mysqli_fetch_row($resultadosPark)){ 

                              echo' <td>'.$filaPark[1].'</td>
                                    <td>'.$fila[4].':00</td>';   
                                        }
                                    }else{
                                    echo' <td> No esta apuntado al parque</td>
                                    <td>-</td>'; 
                                    }
                            echo'</tr>';     
                        }                            
                    } 
                   
                echo '</tbody>';
            ?>

        </table>
    </div>
</div>

</body>
</html>