
<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

$sesion =  $_SESSION["usuario"];


include "conexion.php";

$password =$_POST["contra"];
$passCifrado;

$query = "SELECT * FROM usuarios WHERE nombre='" . $sesion . "'";
$resultados=mysqli_query($conexion,$query);
while($fila=mysqli_fetch_row($resultados)){ 

$passCifrado = $fila[1];

}

    if (password_verify($password,$passCifrado)){


        header("Location:newcontra.php");


    }else{
        header("Location:cambiarcontra.php");

    }


?>