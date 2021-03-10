<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

?>

<?php

$mascota= $_POST['mascota'];
$autor= $_POST['autor'];
$fecha= $_POST['fecha'];
$comentario= $_POST['comentario'];


    include "conexion.php";

    $sql = "INSERT INTO comentarios (mascota,autor,comentario,fecha) VALUES('$mascota','$autor','$comentario','$fecha') ";
    mysqli_query($conexion,$sql);
    header("Location:perfil.php?id=$mascota");


?>