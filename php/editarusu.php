<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body>
<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

echo'   <div class="container mt-3">';

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
                    <h5 class="complementario cambiotipo ">Edita tu Cuenta</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
            <div class="container">
        <div class="row mb-5">
            <div class="col">
                <form method="post" class="w-50 mx-auto" action="editarusupost.php">
                    <div class="mb-3" id="emaildiv">
                        <label class="form-label">Cambiar Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $email ?>" id="mail" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-outline-info btn-block mt-3" id="btnEnviar">Cambiar Email</button>
                    
                    <a href="cambiarcontra.php" class="btn btn-block btn-outline-info mt-4">Cambiar Contraseña</a>
                </form>
            </div>
        </div>
    </div>
    <?php $v=rand(10000,99999)?>
 <script src="../js/editarusu.js?v=<?php echo $v ?>"></script>
</body>

</html>