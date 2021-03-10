<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

?>

<?php

$email= $_POST['email'];
$password1= $_POST['password1'];


$sesion = $_SESSION["usuario"];



    include "conexion.php";

    $sql = "UPDATE usuarios SET email = '$email',password='$password1' WHERE nombre='$sesion'";
    mysqli_query($conexion,$sql);
    header("Location:inicio.php");


?>