<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

$sesion=$_SESSION["usuario"];

include "conexion.php";

    $password1= $_POST["contra"];
    $password2= $_POST["confirma"];
    $passCifrado;

    if($password1==$password2){

        $passCifrado = password_hash($password1, PASSWORD_DEFAULT);
        
        $registrar ="UPDATE usuarios SET password='$passCifrado' WHERE usuario='$sesion'";
    
    mysqli_query($conexion,$registrar);
    
}


 header("Location:mascotas.php");

?>