<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Cambiar Contraseña</title>

    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

</head>

<body class="patas">
<div class="container mt-3">
        <?php

        session_start();

        if(!isset($_SESSION["usuario"])){
            header("Location:../index.html");
        }

        include "botones.php";
        include "conexion.php";

        $sesion =  $_SESSION["usuario"];
        $email;

        $query ="SELECT * FROM usuarios WHERE nombre = '$sesion'";
                            $resultados=mysqli_query($conexion,$query);
                            while($fila=mysqli_fetch_row($resultados)){  
                        
                                $email=$fila[3];                     

                            }
        ?>

</div>
<div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row mb-5">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Cambiar Contraseña</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <form method="post" class="w-50 mx-auto" action="cambiarcontrapost.php">
                    <div class="mb-3" id="emaildiv">
                        <label class="form-label">Contraseña Actual</label>
                        <input type="password" name="contra"  id="contra" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-info btn-block mt-3" sid="btnEnviar">Enviar</button>
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>