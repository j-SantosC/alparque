<?php
echo ' <div class="row">
<div class="col-sm-6 col-xs-6">
   <h5 class="text-secondary"> Bienvenido <small>' . $_SESSION["usuario"] . '</small> <h5>
</div>
<div class="col-sm-6 col-xs-6 text-sm-right text-xs-center">
    <a class="text-secondary" href="window.location.href=`inicio.php`" ><i class="fas fa-arrow-circle-left"></i></a>
     <a href="cierre.php" class="text-secondary "> Cerrar Sesion</a>
</div>
</div>
';
?>