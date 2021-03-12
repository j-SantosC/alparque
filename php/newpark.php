<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Document</title>
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

    <div class="row mb-5">
        <div class="col text-center">
            <h5 class="complementario cambiotipo ">Nuevo Parque</h5>
            <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" class="w-50 mx-auto" action="newparkpost.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Parque</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ubicacion</label>
                        <input type="text" id="direccion" name="direccion" class="form-control">
                    </div>
                    <div class="">
                        <select class="custom-select" id="ciudad" name="ciudad">
                            <option value="default" selected>Selecciona una ciudad ya Registrada</option>
                            <?php

                            include "conexion.php";

                            // Obteninendo ciudades

                                $consulta= " SELECT * FROM  ciudades ORDER BY nombre";
                            
                                $resultados=mysqli_query($conexion,$consulta);
                                while($fila=mysqli_fetch_row($resultados)){  

                                    echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';
                                }
                            ?>

                        </select>
                    </div>
                    <a href="newciudad.php" class="text-secondary"><small>Nueva Ciudad</small></a>
                    <button type="submit" id="btnEnviar"class="btn btn-info btn-block mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
<?php $v=rand(10000,99999)?>
<script src="../js/newpark.js?v=<?php echo $v ?>"></script>
</body>

</html>