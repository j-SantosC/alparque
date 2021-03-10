<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

?>

<?php

$city= $_POST['city'];

$sesion = $_SESSION["usuario"];



    include "conexion.php";

    $sql = "UPDATE usuarios SET ciudad = '$city' WHERE nombre='$sesion'";
    mysqli_query($conexion,$sql);
    header("Location:inicio.php");


?>