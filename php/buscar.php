<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Buscador</title>

    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

</head>

<body class="">
<div class="container mt-3">
    <?php

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:../index.html");
    }

    include "botones.php";
    include "conexion.php";

    $mipag = $_SERVER["PHP_SELF"];

    ?>
</div>
<div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row mb-5">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Buscador</h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
    <div class="container">
    <?php

echo '<div class="row">
        <div class="col-md-6 mx-auto">
       
                 <form class="my-3" action="" method="post">
                    <label>Busca un perro:</label>
                    <input type="text" name="termino" class="form-control">
                    <button name="buscar"type="submit" class="btn btn-block btn-outline-info mt-3 mb-5">Buscar</button>
                 </form>
             </div>
        </div>';
                
                //Si hemos pulsado buscar, buscamos por el nombre del perro

                if(isset($_POST["buscar"])){
                    $termino = $_POST["termino"];
                    echo '<div class="row">';
                        $query="SELECT * FROM mascotas WHERE nombre LIKE '%" . $termino . "%'";
                        $resultados=mysqli_query($conexion,$query);
                        if(mysqli_num_rows($resultadosInicio)==0){
                            echo '"<h5>No hay Perros Registrados con ese Nombre</h5>';
                        }else{

                        while($fila=mysqli_fetch_row($resultados)){ 
                            echo '
                                    <div class="col-xs-12 col-sm-4  ">
                                        <div class="card  ml-3 my-3 text-center mx-auto" style="width: 12rem ;">
                                            <img src="' .$fila[5] .'" class="card-img-top img-fluid" style="width:100%;height:100px;object-fit:cover">
                                            <div class="card-body">
                                                <h5 class="card-title text-secondary">' .$fila[1].'</h5>
                                                <small class="card-text text-secondary text-center ">de ' .$fila[7].'</small> 
                                                <a href="perfil.php?id='.$fila[0].'" class="btn btn-outline-info btn-block mt-3">Ver Perfil</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                } 
                    echo'</div>';
                    }
                }
        
    ?>
       
</div>
</body>

</html>