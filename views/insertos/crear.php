<h1 class="nombre-pagina">Agregar Inserto</h1>
<p class="descripcion-pagina">Llena todos los datos del formulario para agregar un inserto</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/insertos/crear" method="POST" class="formulario" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formularioI.php';
?>

<input type="submit" class="boton" value="Guardar">
</form>