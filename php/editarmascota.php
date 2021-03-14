<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Editar</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body class="mt-3">
<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

include ("conexion.php");

$imagen=$_GET["img"];

if(!isset($_POST["actualizar"])){

    $id=$_GET["id"];
    $nombre=$_GET["nombre"];
    $edad=$_GET["edad"];
    $descripcion=$_GET["descripcion"];

} else{
   
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $edad=$_POST["edad"];
        $descripcion=$_POST["descripcion"];

        $nombre_foto = $_FILES['foto']['name'];
        $size_foto = $_FILES['foto']['size'];
        
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/mascotas/';
        $ruta_relativa = "../img/mascotas/";

        // La siguiente linea de codigo captura lo que hay detras del ultimo "/" - El nombre del archivo
        $nombre_archivo = substr($imagen, strrpos($imagen, '/') + 1);

        if($nombre_foto){

                if($size_foto<=5000000){

                move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta_destino.$nombre_foto);

                $sql = "UPDATE mascotas SET nombre='$nombre',edad ='$edad', img='$ruta_relativa$nombre_foto', descripcion='$descripcion' WHERE id='$id'";
                } 
            
            //En caso de que no se haya subido ningun archivo, 

            }else if(!$imagen){
               // $sql = "UPDATE mascotas SET nombre='$nombre',edad ='$edad', img=$carpeta_destino.$nombre_archivo, descripcion='$descripcion' WHERE id='$id'";
               $sql = "UPDATE mascotas SET nombre='$nombre',edad ='$edad', descripcion='$descripcion' WHERE id=$id";
                
            }else{
                $sql = "UPDATE mascotas SET nombre='$nombre',edad ='$edad', img='../img/defaultdog.jpeg', descripcion='$descripcion' WHERE id=$id";
            } 


    mysqli_query($conexion,$sql);
    header("Location:inicio.php");

}
?>

    <div class="container mt-3">
        
         <?php
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
                    <h5 class="complementario cambiotipo ">Edita tu Mascota</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
    <div class="container mt-3">

    <div class="row m-3">
        <div class="col-md-6 mx-auto">
            <form  name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"enctype="multipart/form-data" >
            <div class="form-group">
                    <input type="text" hidden class="form-control" name="id" value="<?php echo $id  ?>">
                </div>
                <div class="form-group">
                    <label>Nombre de la Mascota</label>
                    <input type="text" class="form-control" id="nombre"name="nombre" value="<?php echo $nombre  ?>">
                </div>
                <div class="form-group">
                    <label>Edad de la Mascota</label>
                    <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $edad  ?>">
                </div>
                <div class="form-group">
                    <label>Foto</label><br>
                    <input type="file" id="imagen" name="foto" value="<?php echo $img  ?>">
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion  ?>">
                </div>
                <br>
                <button type ="submit" name="actualizar" id="btnEnviar" class="btn btn-block btn-outline-info mt-1">Actualizar<i class="fa fa-save ml-2"></i></button>

            </form>
        </div>
    </div>
    <?php $v=rand(10000,99999)?>
    <script src="../js/editarmascota.js?v=<?php echo $v ?>"></script>
</body>

</html>