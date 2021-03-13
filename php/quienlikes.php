<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>A quien le Gusto</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body class="mt-3">
<div class="container mt-3">
    <?php

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:../index.html");
    }
    
    include "botones.php";

    ?>

</div>
        <div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row ">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">A quien le Gusto</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
    <div class="container">
    <?php
        include "conexion.php";

        $session = $_SESSION['usuario'];
        $perro =$_GET["perro"];

    
        echo ' <div class="row mt-5">';
                
            echo ' <div class="col-md-6 mx-auto text-center">';
                  
            echo '<hr>';

                    //Obteniendo los autores de los likes de la mascota seleccionada

                    $query ="SELECT * FROM likes WHERE mascota = '$perro'";
                    $resultadosLikes=mysqli_query($conexion,$query);
                    while($filaLikes=mysqli_fetch_row($resultadosLikes)){  
                
                    echo '<p >'.$filaLikes[2].'</p> ';
                    echo '<hr>';

                    }
             echo '</div>';
        echo '</div>';
    ?>

</div>
</body>

</html>