<h1 class="nombre-pagina">Agregar Pieza</h1>
<p class="descripcion-pagina">Llena todos los datos del formulario para agregar pieza</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/servicios/crear" method="POST" class="formulario" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formulario.php';
?>

<input type="submit" class="boton" value="Guardar">
</form>