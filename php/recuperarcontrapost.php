<?php


$usuario=$_POST["usuario"];

include "conexion.php";

    $password1= $_POST["contra"];
    $password2= $_POST["confirma"];
    $passCifrado;

    if($password1==$password2){

        $passCifrado = password_hash($password1, PASSWORD_DEFAULT);
        
        $registrar ="UPDATE usuarios SET password='$passCifrado' WHERE nombre = '$usuario'";
    
    mysqli_query($conexion,$registrar);

    session_start();

    $_SESSION["usuario"]=$usuario;

    header("Location:inicio.php");
    
}


 header("Location:recperacontra.php");

?>