<h1 class="nombre-pagina">Agregar Machuelo</h1>
<p class="descripcion-pagina">Llena todos los datos del formulario para agregar un machuelo</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/machuelos/crear" method="POST" class="formulario" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formularioM.php';
?>

<input type="submit" class="boton" value="Guardar">
</form>