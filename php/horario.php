<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:../index.html");
}

include "botones.php";

?>
<?php

include "conexion.php";
if(isset($_POST["parquesinicio"])){
    $parque=$_POST["parque"];
}else{
    $parque = $_GET["parque"];

    
}

// Mostrando el nombre del parque

$nombrepark="";
$consultapark= " SELECT * FROM  parques";

$resultados=mysqli_query($conexion,$consultapark);

while($fila=mysqli_fetch_row($resultados)){  
    if ($fila[0]==$parque){
        $nombrepark = $fila[1];
    };
} 

?>  
</div>
    <div class="row fondo my-3">
            <div class="col text-center">
                <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">
              
            </div>
        </div>

        <div class="row">
                <div class="col text-center">
                    <h5 class="complementario cambiotipo ">Horario  <?php echo $nombrepark  ?></h5>
                     <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

                </div>
            </div>
<div class="container">
    <div class="row">
        <div class="col text-left">
        <?php
            //$hoy = getdate();
            $tz = 'Europe/Madrid';
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz));
            $dt->setTimestamp($timestamp);
          
            echo "<p class='text-info '>" . $dt->format('F j, Y, g:i a') . "</p>";
        ?>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col text-center">
            <hr>
            <?php

                $consulta= " SELECT * FROM  mascotas";
                
                for ($i=7; $i<23; $i++ ){
                    echo "<p class='ml-3  badge badge-info mt-0'>" . $i . ":00 </p><br>";
                    
                    $resultados=mysqli_query($conexion,$consulta);
                    while($fila=mysqli_fetch_row($resultados)){  
                        if($fila[4] == $i && $fila[8]==$parque && $fila[9]==date("Y/m/d")){

                        // Mostrando las Tarjetas de las mascotas  
                            
                        echo '
                        <div class="d-inline-flex align-middle  ">
                            <div class="card mx-3 mt-3 " style="width: 10rem ;">
                                <img src="' .$fila[5] .'" class="card-img-top" style="width:100%;height:100px;object-fit:cover">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-center">' .$fila[1].'</h5>
                                    <small class="card-text text-center ">de ' .$fila[7].'</small> 
                                    <a href="perfil.php?id='.$fila[0].'" class="btn btn-outline-primary btn-sm mt-2 btn-block">Ver</a>
                                </div>
                            </div>
                        </div>
                        ';
                        }                                
                    }
                    echo "<hr>";
                }
                
        ?>
        </div>
    </div>
</div>
</body>
</html>