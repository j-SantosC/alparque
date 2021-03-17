<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">

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
<script type="module">

    import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'   

function estasSeguro(id) {

    Swal.fire({
        title: 'Estas Seguro?',
        text: 'El email se modificara de forma definitiva',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cambiar email'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Buen Trabajo!',
                text: 'Has cambiado tu email!',
                icon: 'success',
                showConfirmButton: false,
            })
            setTimeout(() => {
                window.location(`../php/borrar.php?id=${id}`)
            }, 1500)

        }
    })
}

</script>
</div>
       <div class="row fondo my-3">
        <div class="col text-center">
            <img src="../img/logotransp.png" class="w-25 ml-5  float-left img-fluid " alt="">

        </div>
    </div>
    <div class="row mb-5">
        <div class="col text-center">
            <h5 class="complementario cambiotipo ">Mis Mascotas</h5>
            <hr style="height:1px;border-width:0;color:#B84758;background-color:#B84758">

        </div>
    </div>
    <div class="container">
</div>

<div class="row">
    <div class="col mx-3">
        <table class="table table-light table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Borrar/Editar</th>
                </tr>
            </thead>

            <?php 
                include "conexion.php";
                $sesion = $_SESSION["usuario"];


                $consulta ="SELECT * FROM mascotas WHERE propietario ='$sesion' ";
                $resultados = mysqli_query($conexion,$consulta);

                echo "<tbody>";

                while($fila=mysqli_fetch_row($resultados)){
                    echo "<tr>
                    <td>$fila[0]</td> 
                    <td>$fila[1]</td>
                    <td>$fila[2]</td>
                    <td>$fila[3]</td>
                    <td><button  class='btn btn-danger' onclick='estasSeguro($fila[0])'><i class='fa fa-trash text-white'></i></button>
                    <button  class='btn btn-warning'><a href='editarmascota.php?id=$fila[0]&nombre=$fila[1]&edad=$fila[2]&img=$fila[5]&descripcion=$fila[6]'><i class='fa fa-edit text-white'></i></button></td>
                    </tr>";
                }

                echo "</tbody>";

                
            ?>

        </table>
    </div>
    <?php $v=rand(10000,99999)?>
 <script type="module" src="../js/mascotas.js?v=<?php echo $v ?>"></script>
</body>
</html>