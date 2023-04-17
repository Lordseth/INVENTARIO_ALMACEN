<h1 class="nombre-pagina">Machuelos</h1>
<p class="descripcion-pagina">Administracion de Machuelos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar por numero de parte</h2>
<div class="busqueda">
    <form action="/machuelos/buscar" class="formulario">
        <div class="campo">
            <label for="servicio">Numero de Parte</label>
            <input 
                type="text"
                id="servicio"
                name="numero_parteM"
            >
        </div>
    </form>
</div>


<ul class="servicios">

<?php foreach($machuelos as $machuelo)  { ?>
    
    <li>
        <p>Numero de Parte: <span><?php echo $machuelo->numero_parteM; ?></span></p>
        <p>Descripcion: <span><?php echo $machuelo->descripcionM; ?></span></p>
        <p>Cantidad en Existencia: <span><?php echo $machuelo->existenciaM; ?></span></p>
        <p>Foto: <span><?php echo $machuelo->fotoM; ?></span></p>
        <p>Proveedor: <span><?php echo $machuelo->proveedorM; ?></span></p>
        <p>Ubicacion: <span><?php echo $machuelo->ubicacionM; ?></span></p>

        <div class="foto-pieza">
            <img src="/machuelosimg/<?php echo $machuelo->fotoM; ?>" alt="imagen machuelo" >
        </div>

        <div class="acciones">
            <a class="boton" href="/machuelos/actualizar?id=<?php echo $machuelo->id; ?>">Actualizar</a>
            <form action="/machuelos/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $machuelo->id; ?>">
                <input type="submit" value="Borrar" class="boton-eliminar">
        </form>
        </div>
    </li>

    
   <?php } ?>

</ul>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>