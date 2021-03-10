<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

?>

<?php

include "conexion.php";

$darlike= $_GET["darlike"];
$mascota= $_GET["mascota"];
$autor= $_GET["autor"];

if($darlike==1){

    $sql = "INSERT INTO likes (mascota,autor) VALUES('$mascota','$autor') ";
    mysqli_query($conexion,$sql);
    header("Location:perfil.php?id=$mascota");
}else{

    $sql2 ="DELETE FROM likes WHERE mascota= '$mascota' AND autor ='$autor'";
    mysqli_query($conexion, $sql2);
    header("Location:perfil.php?id=$mascota");

}
?>