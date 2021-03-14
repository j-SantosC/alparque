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

    if($nombre_foto){
        if($size_foto<=5000000){

            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/mascotas/';
        
            $ruta_relativa = "../img/mascotas/";
        
            move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta_destino.$nombre_foto);
        
            }  
            
            $registrar ="INSERT INTO mascotas (nombre,edad,sexo,hora,img,descripcion,propietario,parque,date)
                         VALUES ('$nombre','$edad','$sexo',0,'$ruta_relativa$nombre_foto','$descripcion','$propietario',1,'0000-00-00')";
            
    }else{
              
            
            $registrar ="INSERT INTO mascotas (nombre,edad,sexo,hora,img,descripcion,propietario,parque,date)
                         VALUES ('$nombre','$edad','$sexo',0,'../img/defaultdog.jpeg','$descripcion','$propietario',1,'0000-00-00')";
            
    }
 mysqli_query($conexion,$registrar);
 header("Location:inicio.php");

?>