
<?php

include "conexion.php";

    $usuario= $_POST["usuario"];
    $email=$_POST["email"];
    $ciudad=$_POST["ciudad"];

    $password= $_POST["password1"];
    $passCifrado = password_hash($password, PASSWORD_DEFAULT);

    $registrar ="INSERT INTO usuarios (nombre,password,ciudad,email)
                 VALUES ('$usuario','$passCifrado',$ciudad,'$email')";
    
 mysqli_query($conexion,$registrar);

 session_start();

 $_SESSION["usuario"]=$usuario;

 header("Location:inicio.php");

?>