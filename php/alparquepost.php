<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

?>

<?php

$hora= $_POST['hora'];
$id= $_POST['id'];
$parque= $_POST['parque'];
$date= $_POST['date'];


    include "conexion.php";

    $sql = "UPDATE mascotas SET hora ='$hora', parque = '$parque', date = '$date' WHERE id='$id'";
    mysqli_query($conexion,$sql);
    header("Location:horario.php?parque=". $parque);


?>