<?php
echo ' <div class="row">
            <div class="col-6 text-left">
               <h5 class="text-secondary"> Bienvenido <small>' . $_SESSION["usuario"] . '</small> <h5>
            </div>
            <div class="col-6 text-right">
               <a class="text-secondary btn btn-outline-secondary mr-2" href="inicio.php" ><i class="fas fa-arrow-circle-left"></i></a>
               <a href="cierre.php" class="text-secondary "> Cerrar Sesion</a>
            </div>
</div>
';
?>