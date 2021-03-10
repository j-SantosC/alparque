<?php
echo ' <div class="row">
<div class="col-sm-6 col-xs-12">
   <h4 class="text-secondary"> Bienvenido <small>' . $_SESSION["usuario"] . '</small> <h3>
</div>
<div class="col-sm-6 col-xs-12 text-sm-right text-xs-center">
    <button class="btn btn-outline-secondary" onClick="window.location.href=`inicio.php`" ><i class="fas fa-arrow-circle-left"></i></button>
     <a href="cierre.php" class="btn btn-outline-secondary "> Cerrar Sesion</a>
</div>
</div>
';
?>