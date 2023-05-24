<h1 class="nombre-pagina">Agregar Consumible</h1>
<p class="descripcion-pagina">Llena todos los datos del formulario para agregar un consumible</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/consumibles/crear" method="POST" class="formulario" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formularioCons.php';
?>

<input type="submit" class="boton" value="Guardar">
</form>