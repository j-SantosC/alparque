<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/styles.css">

    <title>Perfil</title>
</head>

<body class="mt-3">
<div class="container">
    <?php

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:index.html");
    }

    // Botones de Cerrar Sesion y de Regresar

   include "botones.php";

    ?>
</div>
<div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row mb-5">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Perfil</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
<div class="container">
    <div class="row">
        <div class=" col text-center mx-auto mb-5>
            <?php

            // Aqui calculamos los likes

            include "conexion.php";

            $id = $_GET["id"];
            
            $consultaLikes= " SELECT *  FROM likes WHERE mascota =$id";
            $resultadosLikes=mysqli_query($conexion,$consultaLikes);
           
            $totalLikes = mysqli_num_rows($resultadosLikes) ;

            ?>
            <?php


                 $sesion = $_SESSION['usuario'];


                 $consulta= " SELECT * FROM  mascotas WHERE id=$id";
                        
                 $resultados=mysqli_query($conexion,$consulta);

                 while($fila=mysqli_fetch_row($resultados)){  

                    $consultaLikes= " SELECT * FROM  likes WHERE mascota=$id AND autor ='" . $sesion . "'";

                    $resultadosLikes=mysqli_query($conexion,$consultaLikes);

                    //Aqui modificamos el icono del "like"

                    if (mysqli_num_rows($resultadosLikes)==0){
                        
                        echo '<div><a href="likes.php?darlike=1&mascota='.$id.'&autor='.$sesion.'"><i class="far fa-heart fa-2x float-right text-info"></i></a></div>';
                        
                    }else{
                        
                        echo '<div><a href="likes.php?darlike=0&mascota='.$id.'&autor='.$sesion.'"><i class="fas fa-heart fa-2x float-right text-info"></i></a></div>';
                    }

                        // Info del Perfil

                        echo '<img src="'.$fila[5].'" alt="" class="w-75 rounded-circle  img-fluid mb-3" stlye="height=300px;width=auto">';
                        echo '<h3 class="text-center text-secondary">' . $fila[1] . ' <small> de '.$fila[7].'</small></h3>';
                        echo  '<p class="text-secondary">'.$fila[3]. ' | '.$fila[2].' años </p>';
                        echo  '<a href="quienlikes.php?perro='. $fila[0] .'" class="text-info">'. $totalLikes .' likes</a>';
                        echo '<hr>';
                        echo '<p class="text-center text-secondary  p-3">"'.$fila[6].'"</p>';
                        echo '<hr>';

                                $query3 ="SELECT * FROM parques WHERE id = '$fila[8]'";
                                $resultadosPark=mysqli_query($conexion,$query3);
                                while($filaPark=mysqli_fetch_row($resultadosPark)){
                                    if($fila[9]==date("Y/m/d")){
                                         echo '<p class="text-center rounded text-light fondo p-3">Estare en el parque '.$filaPark[1].' a las '.$fila[4].':00</p>';
                                }
                            }
                        $hoy = date("Y-m-d H:i:s");
                                    
                        // Este es el formulario de los comentarios

                        echo '
                                <form method="post" action="comentPost.php">
                                    <input type="hidden" name="mascota" value="' .$fila[0].'">
                                    <input type="hidden" name="autor" value="' .$_SESSION["usuario"].'">
                                    <input type="hidden" name="fecha" value="' .$hoy.'">
                                    <div class="form-floating text-left text-secondary">
                                        <label >Deja un comentario:</label>
                                        <textarea name="comentario" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-outline-info btn-block mt-2">Enviar</button>
                                </form>
                                <hr>
                                ';
                        
                        echo '<p class="text-secondary mt-3 text-left">Comentarios de ' .$fila[1]. ':</p>';
                       
                        $consultaComent= "SELECT * FROM  comentarios WHERE mascota= $id ORDER BY fecha DESC";
                                                
                        $resultadosComent=mysqli_query($conexion,$consultaComent);

                        while($filaComent=mysqli_fetch_row($resultadosComent)){ 

                            //Comentario hacia derecha o izquierda dependiendo si es propio o ajeno
                            
                            if($filaComent[2]==$fila[7]){

                                echo '<div class="w-75 float-right mb-3 border border-success p-2">';
                                echo '<div class="d-flex justify-content-between">';
                                    echo '<div><small class="text-secondary text-left">'. $filaComent[2] . '</small></div>';
                                    echo '<div><small class="text-secondary text-right">'. $filaComent[4] .'</small></div>';
                                echo '</div>';
                                 echo '<p class=" p-2 text-left mr-auto"><small class="font-italic">' . $filaComent[3]. '</small></p>';
                                echo '</div>';
                               
                         }else{

                            echo '<div class="w-75 float-left mb-3 border border-info p-2">';
                            echo '<div class="d-flex justify-content-between">';
                                echo '<div><small class="text-secondary text-left">'. $filaComent[2] . '</small></div>';
                                echo '<div><small class="text-secondary text-right">'. $filaComent[4] .'</small></div>';
                            echo '</div>';
                             echo '<p class=" p-2 text-left mr-auto"><small class="font-italic">' . $filaComent[3]. '</small></p>';
                            echo '</div>';

                         }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>