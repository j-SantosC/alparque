<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

?>

<?php

$sesion = $_SESSION["usuario"];

$hora= $_POST['hora'];
$parque= $_POST['parque'];
$date= $_POST['date'];


    include "conexion.php";

    $sql = "UPDATE mascotas SET hora ='$hora', parque = '$parque', date = '$date' WHERE propietario='$sesion'";
    mysqli_query($conexion,$sql);
    header("Location:horario.php?parque=". $parque);


?>