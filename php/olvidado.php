

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Nueva Contraseña</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">
   
   </div>
   <div class="row fondo ">
        <div class="col text-center">
            <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">

        </div>
    </div>

    <div class="row mb-5">
        <div class="col text-center">
            <h5 class="complementario cambiotipo pt-2">Olvide mi Contraseña</h5>
            <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" class=" mx-auto" action="olvidadopost.php">
                    <div class="mb-3">
                        <label class="form-label">Introduce tu email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    
                    <button type="submit" id="btnEnviar" class="btn btn-info btn-block mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
<?php $v=rand(10000,99999)?>
 <script src="../js/olvidado.js?v=<?php echo $v ?>"></script>
</body>

</html>