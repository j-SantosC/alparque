<?php

include "conexion.php";

$usuario = $_POST["usuario"];
$password =$_POST["password"];
$passCifrado;

$query = "SELECT * FROM usuarios WHERE nombre='" . $usuario . "'";
$resultados=mysqli_query($conexion,$query);
while($fila=mysqli_fetch_row($resultados)){ 

$passCifrado = $fila[1];

}

    if (password_verify($password,$passCifrado)){

        session_start();

        $_SESSION["usuario"]=$usuario;

        header("Location:inicio.php");


    }else{
        header("Location:../index.html");

    }


?>