<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $db_host="localhost";
    $db_nombre="u406286605_alparque";
    $db_usuario="u406286605_jacobosantos";
    $db_contra="Podemos13!";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);

    if(mysqli_connect_errno()){

        echo " Fallo al conectar a la BBDD";

        exit();
    }

?>
</body>
</html>