<h1 class="nombre-pagina">Actualizar Informacion de Broca</h1>
<p class="descripcion-pagina">Actualiza los valores del formulario</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" class="formulario" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formularioB.php';
?>

<input type="submit" class="boton" value="Actualizar">
</form>