<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

    <title>Apuntate</title>
</head>

<body class="patas mt-3">
<div class="container">
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

        <div class="row mb-5">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Apuntate</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">
                </div>
            </div>
    <div class="container"> 
       
    <div class="row">
        <div class="col text-center">
            <?php
                 $id = $_GET["id"];
                 $nombre= $_GET["nombre"];
                 $imagen= $_GET["imagen"];


                 echo '<img src="'.$imagen.'" alt="" class="rounded-circle w-25 mb-3">';
                echo '<h3 class="text-center text-secondary"><small>Hola</small> ' . $nombre . '</h3>';

            ?>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-md-6 mx-auto">
            <form  action="alparquepost.php" method="post">
            <div class="form-group">
                    <input type="text " hidden class="form-control " readonly name="date" value= <?php echo date("Y/m/d")  ?>>
                </div>
                <div class="form-group">
                    <input type="text " hidden class="form-control " readonly name="id" value= <?php echo $id  ?>>
                </div>
                <div class="form-group">
                    <label>Hora de Parque</label>
                    <select name="hora" id="hora" class="form-control">
                        <option value="default"selected>Elige Hora </option> 

                        <?php
                            for($i=7;23>$i;$i++){

                                echo '<option value="'.$i.'">'.$i.':00</option>';
                            }
                        ?>
                    </select>
                </div>
                <div>
                <select class="custom-select" id="parque" name="parque">
                    <option value="default"selected>Elige el Parque </option> 
                        <?php
                                include "conexion.php";

                                $sesion= $_SESSION["usuario"];
                                $ciudadUser;
                        
                                //Obteniendo la ciudad del Usuario
                                $consulta3= " SELECT * FROM  usuarios WHERE nombre='$sesion'";
                                
                                $resultados3=mysqli_query($conexion,$consulta3);
                                while($filauser=mysqli_fetch_row($resultados3)){  
                                    
                                    $ciudadUser = $filauser[2];          
                                }

                                //Mostrando los parques de la ciudad del usuario
                                $consulta2= " SELECT * FROM  parques WHERE ciudad='$ciudadUser'";

                                $resultados2=mysqli_query($conexion,$consulta2);
                                while($filaOpt=mysqli_fetch_row($resultados2)){  

                                    echo '<option value="'.$filaOpt[0].'">'.$filaOpt[1].'</option>';   
                                }
                            ?>
                </select>
                </div>

                <br>
                    <button type ="submit"id="btnEnviar" name="save"class="btn btn-outline-info btn-block mt-3">Apuntarse<i class="fa fa-exclamation ml-2"></i></button>                   
            </form>
        </div>
    </div>
    <?php $v=rand(10000,99999)?>
    <script src="../js/alparque.js?v=<?php echo $v ?>"></script>
</body>

</html>