
<?php

include "conexion.php";

$usuario= $_POST["usuario"];
$email=$_POST["email"];
$ciudad=$_POST["ciudad"];

$consultaUsu= " SELECT * FROM  usuarrios WHERE nombre='" . $usuario . "'";
                        
                $resultadosUsu=mysqli_query($conexion,$consultaUsu);
                if(mysqli_num_rows($resultadosUsu)>0){

                    header("Location:usuarioexiste.php");

             } else{

                $consultaMail= " SELECT * FROM  usuarrios WHERE email='" . $email . "'";
                        
                $resultadosMail=mysqli_query($conexion,$consultaMail);
                if(mysqli_num_rows($resultadosMail)>0){

                    header("Location:emailexiste.php");


                }else{

                $password= $_POST["password1"];
                $passCifrado = password_hash($password, PASSWORD_DEFAULT);
            
                $registrar ="INSERT INTO usuarios (nombre,password,ciudad,email)
                             VALUES ('$usuario','$passCifrado',$ciudad,'$email')";
                
                mysqli_query($conexion,$registrar);
            
                 session_start();
            
                $_SESSION["usuario"]=$usuario;
            
                 header("Location:inicio.php");

             }

  
            }
  

?>