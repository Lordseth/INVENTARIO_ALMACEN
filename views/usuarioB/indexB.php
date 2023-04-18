<h1 class="nombre-pagina">Brocas</h1>
<p class="descripcion-pagina">Visualizacion de Brocas</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar por numero de parte</h2>
<div class="busqueda">
    <form action="/usuarioB/buscarB" class="formulario">
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

<?php foreach($brocas as $broca)  { ?>
    
    <li>
        <p>Numero de Parte: <span><?php echo $broca->numero_parteB; ?></span></p>
        <p>Descripcion: <span><?php echo $broca->descripcionB; ?></span></p>
        <p>Cantidad en Existencia: <span><?php echo $broca->existenciaB; ?></span></p>
        <p>Proveedor: <span><?php echo $broca->proveedorB; ?></span></p>
        <p>Ubicacion: <span><?php echo $broca->ubicacionB; ?></span></p>

        <div class="foto-pieza">
            <img src="/brocasimg/<?php echo $broca->fotoB; ?>" alt="imagen broca" >
        </div>
    </li>

    
   <?php } ?>

</ul>

<?php 
    $script = "<script src='build/js/buscadorServicios.js'></script>"
?>