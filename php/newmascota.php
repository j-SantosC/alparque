<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Nueva Mascota</title>
    
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="sweetalert2.min.css">

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

    <div class="row mb-5">
        <div class="col text-center">
            <h5 class="complementario cambiotipo ">Nueva Mascota</h5>
            <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

        </div>
    </div>
<div class="container">
    <div class="row m-3">
        <div class="col-md-6 mx-auto">
            <form  action="newmascotapost.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre de la Mascota</label>
                    <input type="text" id="nom"class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label>Edad de la Mascota</label>
                    <input type="text" id="edad"class="form-control" name="edad">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" id="foto" name="foto">
                </div>

                <div class="form-floating">
                    <label >Descripcion</label>
                        <textarea name="descripcion" id="desc" class="form-control"></textarea>
                </div>
                
                <div class="form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="macho" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Macho
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="hembra">
                    <label class="form-check-label" for="gridRadios2">
                    Hembra
                    </label>
                </div>

                <br>
                    <button type ="submit" id="btnEnviar"name="save"class="btn btn-outline-primary btn-block mt-3">Guardar<i class="fa fa-save ml-2"></i></button>
                    
                </form>
            </div>
            <button class="btn btn-primary" id="sweet">Sweet Alert</button>
    </div>
    <?php $v=rand(10000,99999)?>
    <script type ="module" src="../js/newmascota.js?v=<?php echo $v ?>"></script>
    <script type ="module" src="sweetalert2.all.min.js"></script>
</body>

</html>