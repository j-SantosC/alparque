<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

    <title>Inicio</title>
</head>

<body class=" mt-3">
<div class="container">
    <?php

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:../index.html");
    }

    echo ' <div class="row mb-3">
                    <div class="col-6 text-left">
                       <h5 class="text-secondary"> Bienvenido <small>' . $_SESSION["usuario"] . '</small> </h5>
                    </div>
                    
                    <div class="col-6 text-right">
                         <a href="cierre.php" class="text-secondary"> Cerrar Sesion<a>
                    </div>

            </div>
    ';

    ?>
</div>
        <div class="row fondo">
            <div class="col text-center">
              <img src="../img/logotransp.png" class="img-fluid w-50" alt="">
              
            </div>
        </div>

        <div class="row my-3">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo">Inicio</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
        </div>
        <div class="container">
        <div class="row ">
            <div class="col text-center">
            <?php
                        include "conexion.php";
                        $sesion = $_SESSION["usuario"];
                        
                        $consultaInicio= " SELECT * FROM  mascotas WHERE propietario='" . $sesion . "'";
                        
                        $resultadosInicio=mysqli_query($conexion,$consultaInicio);
                        if(mysqli_num_rows($resultadosInicio)==0){
                            echo '<h5 class="text-secondary mb-3">¿Aun no has registrado a tu Perro?</h5>';
                            echo '<a href="newmascota.php" class=" btn btn-outline-info p-3">Registrar Mascota</a>';
                        }  else{
                            echo'<h5 class=" mt-5 text-secondary font-italic">Como estan tus mascotas?</h5> ';
                        }
        ?>
        
            </div>
        </div>
    </div>
    <div class="row mx-auto mb-3 ">
                    <?php
                        include "conexion.php";
                        $sesion = $_SESSION["usuario"];

                        //Obteniendo las mascotas del usuario

                        $consulta= " SELECT * FROM  mascotas";
                        
                            $resultados=mysqli_query($conexion,$consulta);
                            while($fila=mysqli_fetch_row($resultados)){  
                                if($fila[7] == $_SESSION["usuario"]){
                                echo '
                                <div class="col-xs-12 col-sm text-center ">
                                    <div class="card  ml-3 mt-3 mx-auto" style="width: 12rem ;">
                                        <img src="' .$fila[5] .'" class="card-img-top img-fluid" style="width:100%;height:100px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-secondary">' .$fila[1].'</h5>
                                            <a href="alparque.php?id='.$fila[0].'&nombre='.$fila[1].'&imagen='.$fila[5].'" class=" btn btn-outline-info btn-block mt-3">Al Parque!</a>
                                            <a href="perfil.php?id='.$fila[0].'" class="btn btn-outline-info btn-block mt-3">Ver Perfil</a>
                                        </div>
                                    </div>
                                </div>
                                ';
                                }                                
                            }   
                    ?>
            <br>
        </div>
        <div class="container">
        <div class="text-center row ">
           <div class="col-xs-12 col-sm-8 mx-auto">    

            <?php

                //Creando el boton Todos al Parque, si hay mas de una mascota

                $consultaNum= " SELECT * FROM  mascotas WHERE propietario='" . $sesion . "'";
                        
                $resultadosNum=mysqli_query($conexion,$consultaNum);
                if(mysqli_num_rows($resultadosNum)>1){
                    echo '<a href="todosalparque.php" class=" btn btn-outline-info btn-block p-3 btn">Todos al Parque!</a>';
                }  
            ?>
            </div> 
          
    </div>      
   <?php
                        $sesion= $_SESSION["usuario"];
                        $ciudaduser;
                        
                        //Obteniendo la ciudad del Usuario
                        $consulta3= " SELECT * FROM  usuarios WHERE nombre='$sesion'";
                        
                        $resultados3=mysqli_query($conexion,$consulta3);
                        while($filauser=mysqli_fetch_row($resultados3)){  

                            $ciudadUser = $filauser[2];          
                     
                        }
                        ?>

                        
    <div class="row fondo my-5 ">
        <div class="col-md-8 mx-auto text-center mt-3">  
            <form action="horario.php" method="post">
                <?php
                // Obteninendo el nombre de la ciudad Actual

                 $ciudadActual;
                 $consultaCity= " SELECT * FROM  ciudades WHERE id='$ciudadUser'";
                 
                 $resultadosCity=mysqli_query($conexion,$consultaCity);
                 while($filaCity=mysqli_fetch_row($resultadosCity)){  
                     
                     $ciudadActual=$filaCity[1];
                     
                    }
                    
                    ?>
                <h5 class="text-center  text-light  my-2">Buscador de Perros:</h5>
                <a href="buscar.php"> <h5 class=" p-3 my-4 btn btn-outline-light"><i class=" fas  mr-3  fa-search "></i>Ir al Buscador</h5></a>
                
                <hr style="height:1px;border-width:0;color:white;background-color:white">

                <h5 class="text-center  text-light my-4">Quien se apunto al parque en <?php echo $ciudadActual ?>?</h5>
                <select class="custom-select" name="parque">
                    <option selected>Elige el Parque </option>
 
                        <?php
                                //Mostrando los parques de la ciudad del usuario

                                $consulta2= " SELECT * FROM  parques WHERE ciudad='$ciudadUser'";

                                $resultados2=mysqli_query($conexion,$consulta2);
                                while($filaOpt=mysqli_fetch_row($resultados2)){  

                                    echo '<option value="'.$filaOpt[0].'">'.$filaOpt[1].'</option>';
 
                                }
                            ?>
                </select>
                
                
                <button type ="submit" name="parquesinicio" class="btn btn-outline-light my-4">Ver Horario<i class="fa fa-calendar ml-2"></i></button> <br>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5 class="text-secondary tezt-center">Opciones</h5>
            <hr>
        </div>
    </div>
    <div class="row text-center mb-5">  
          <div class="col-xs-12 col-sm-6">
            <a href="newmascota.php" class=" mt-2 text-secondary "><i class="fas fa-bone mb-3 mr-2"></i>Registrar nueva Mascota</a> <br>
            <a href="perroslikes.php" class=" mt-2 text-secondary "><i class="fas fa-heart mb-3 mr-2"></i>Perros que me gustan </a> <br> 
            <a href="newpark.php" class=" mt-2 text-secondary "><i class="fas fa-tree mb-3 mr-2"></i>Registrar nuevo Parque </a> <br> 
        </div>          
        <div class="col-xs-12 col-sm-6">
            <a href="mascotas.php" class=" mt-2 text-secondary "><i class="fas fa-dog mb-3 mr-2"></i>Editar Mascotas </a> <br> 
            <a href="cambiocity.php" class=" mt-2 text-secondary "><i class="fas fa-city mb-3 mr-2"></i>Cambiar de Ciudad </a> <br>
            <a href="editarusu.php" class=" mt-2 text-secondary "><i class="fas fa-user mb-3 mr-2"></i>Editar mi Cuenta </a>  
        </div>          
     </div>
</div>
</body>

</html>