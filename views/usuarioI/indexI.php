<h1 class="nombre-pagina">Insertos</h1>
<p class="descripcion-pagina">Visualizacion de Insertos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar por numero de parte</h2>
<div class="busqueda">
    <form action="/usuarioI/buscarI" class="formulario">
        <div class="campo">
            <label for="servicio">Numero de Parte</label>
            <input 
                type="text"
                id="servicio"
                name="numero_parteI"
            >
        </div>
    </form>
</div>


<ul class="servicios">

<?php foreach($insertos as $inserto)  { ?>
    
    <li>
        <p>Numero de Parte: <span><?php echo $inserto->numero_parteI; ?></span></p>
        <p>Descripcion: <span><?php echo $inserto->descripcionI; ?></span></p>
        <p>Cantidad en Existencia: <span><?php echo $inserto->existenciaI; ?></span></p>
        <p>Proveedor: <span><?php echo $inserto->proveedorI; ?></span></p>
        <p>Ubicacion: <span><?php echo $inserto->ubicacionI; ?></span></p>

        <div class="foto-pieza">
            <img src="/insertosimg/<?php echo $inserto->fotoI; ?>" alt="imagen inserto" >
        </div>
    </li>

    
   <?php } ?>

</ul>

<?php 
    $script = "<script src='build/js/buscadorServicios.js'></script>"
?>