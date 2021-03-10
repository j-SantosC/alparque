<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Todos al parque</title>
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

                ?>

    
    </div>
        <div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row ">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Todos al Parque</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
    
    
            <div class="row m-3">
                    <?php
                        include "conexion.php";
                        $sesion = $_SESSION["usuario"];

                        //Obteniendo las mascotas del usuario

                        $consulta= " SELECT * FROM  mascotas";
                        
                            $resultados=mysqli_query($conexion,$consulta);
                            while($fila=mysqli_fetch_row($resultados)){  
                                if($fila[7] == $_SESSION["usuario"]){
                                echo '
                                <div class="col-xs-12 col-sm text-center ">
                                    <div class="card  ml-3 mt-3 mx-auto" style="width: 12rem ;">
                                        <img src="' .$fila[5] .'" class="card-img-top" style="width:100%;height:100px;object-fit:cover">
                                        <div class="card-body">
                                            <h5 class="card-title">' .$fila[1].'</h5>
                                        </div>
                                    </div>
                                </div>
                                ';
                                }                                
                            }   
                    ?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 mx-auto">
                   
                     <form  action="todosalparquepost.php" method="post">
                     <div class="form-group">
                            <input type="text " hidden class="form-control " readonly name="date" value= <?php echo date("Y/m/d")  ?>>
                    </div>
                        <div class="form-group">
                            <label>Hora de Parque</label>
                            <input type="text" class="form-control" id="hora"name="hora">
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
                            <button type ="submit"id="btnEnviar" name="save"class="btn btn-outline-primary btn-block my-3">Apuntarse<i class="fa fa-exclamation ml-2"></i></button>                   
                </form>
        </div>
    </div>
</div>
<!-- <script src="../js/alparque.js"></script> -->
</body>

</html>