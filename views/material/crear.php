<h1 class="nombre-pagina">Agregar Material</h1>
<p class="descripcion-pagina">Llena todos los datos del formulario para agregar un material</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/material/crear" method="POST" class="formularioMat" enctype="multipart/form-data">

<?php 
    include_once __DIR__ . '/formularioMat.php';
?>

<input type="submit" class="boton" value="Guardar">
</form>