<h1 class="nombre-pagina">Piezas</h1>
<p class="descripcion-pagina">Visualizacion de Piezas</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar por numero de parte</h2>
<div class="busqueda">
    <form action="/usuario/buscar" class="formulario">
        <div class="campo">
            <label for="servicio">Numero de Parte</label>
            <input 
                type="text"
                id="servicio"
                name="numero_parte"
            >
        </div>
    </form>
</div>


<ul class="servicios">

<?php foreach($servicios as $servicio)  { ?>
    
    <li>
        <p>Cliente: <span><?php echo $servicio->cliente; ?></span></p>
        <p>Numero de Parte: <span><?php echo $servicio->numero_parte; ?></span></p>
        <p>Descripcion: <span><?php echo $servicio->descripcion_pieza; ?></span></p>
        <p>Numero de Dibujo: <span><?php echo $servicio->numero_dibujo; ?></span></p>
        <p>Cantidad: <span><?php echo $servicio->cantidad_piezas; ?></span></p>
        <p>Ubicacion: <span><?php echo $servicio->ubicacion; ?></span></p>
        <p>Tipo de Material: <span><?php echo $servicio->tipo_material; ?></span></p>

        <div class="foto-pieza">
            <img src="/fotos/<?php echo $servicio->foto; ?>" alt="imagen pieza" >
        </div>
    </li>

    
   <?php } ?>

</ul>

<?php 
    $script = "<script src='build/js/buscadorServicios.js'></script>"
?>