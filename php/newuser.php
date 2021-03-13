<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body>
    <div class="row fondo my-3">
        <div class="col text-center">
            <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">

        </div>
    </div>

    <div class="row mb-5">
        <div class="col text-center">
            <h5 class="complementario cambiotipo ">Registrate</h5>
            <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

        </div>
    </div>
    <div class="container ">
        <div class="row mb-5 w-75 mx-auto">
            <div class="col">
                <form method="post" class=" mx-auto" action="newuserpost.php">

                 <div>
                    <label for="exampleInputPassword1" class="form-label">Ciudad</label>
                        <select class="custom-select mb-2" name="ciudad" id="ciud">
                            <option selected value="default">Selecciona una ciudad ya Registrada</option>
                            <?php

                            include "conexion.php";

                                $consulta= " SELECT * FROM  ciudades ORDER BY nombre";
                            
                                $resultados=mysqli_query($conexion,$consulta);
                                while($fila=mysqli_fetch_row($resultados)){  

                                    echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';
                                }
                            ?>

                        </select>
                 </div>
                    <a href="newciudad.php" class="text-secondary">Nueva Ciudad</a>
                    <div class="mb-3" id="usudiv">
                        <label class="form-label mt-2">Nombre de Usuario</label>
                        <input type="text" name="usuario" id="usu" class="form-control">
                    </div>           
                    <div class="mb-3" id="emaildiv">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" id="mail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password1" id="pass1" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirma Password</label>
                        <input type="password" name="password2" id="pass2" class="form-control" id="exampleInputPassword1">
                    </div>

                 
                    <button type="submit" class="btn btn-info btn-block my-3" id="btnEnviar">Enviar</button>
                    <a href="../html/login.html" class="text-secondary">Ya tengo Cuenta</a>
                </form>
            </div>
        </div>
    </div>
    <?php $v=rand(10000,99999)?>
    <script src="../js/newuser.js?v=<?php echo $v ?>"></script>
</body>

</html>