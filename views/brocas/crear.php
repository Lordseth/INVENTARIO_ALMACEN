<h1 class="nombre-pagina">Agregar Broca</h1>
<p class="descripcion-pagina">Llena todos los datos del formulario para agregar una broca</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/brocas/crear" method="POST" class="formulario" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formularioB.php';
?>

<input type="submit" class="boton" value="Guardar">
</form>