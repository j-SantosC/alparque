<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}
?>
<?php

include "conexion.php";

    $nombre= $_POST["nombre"];
    $edad= $_POST["edad"];
    $sexo= $_POST["sexo"];
    $hora = $_POST["hora"];
    $descripcion = $_POST["descripcion"];
    $propietario = $_SESSION["usuario"];


    $nombre_foto = $_FILES['foto']['name'];
    $tipo_foto = $_FILES['foto']['type'];
    $size_foto = $_FILES['foto']['size'];

    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/mascotas/';

    move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta_destino.$nombre_imagen);
    
    
    $registrar ="INSERT INTO mascotas (nombre,edad,sexo,hora,img,descripcion,propietario,parque,date)
                 VALUES ('$nombre','$edad','$sexo',0,'foto','$descripcion','$propietario',0,'0000-00-00')";
    
 mysqli_query($conexion,$registrar);
 header("Location:inicio.php");

?>