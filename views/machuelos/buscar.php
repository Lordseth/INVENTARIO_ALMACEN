<h1 class="nombre-pagina">Resultados</h1>

<?php 
    include_once __DIR__ . '/../templates/barra.php'
?>

<h2>Buscar por numero de parte</h2>
<div class="busqueda">
    <form action="" class="formulario">
        <div class="campo">
            <label for="servicio">Numero de Parte</label>
            <input 
                type="text"
                id="servicio"
                name="numero_parteM"
                value=""
            >
        </div>
    </form>
</div>

<?php
    if(count($machuelos) === 0) {
        echo "<h2>No Hay Machuelos con ese numero de parte</h2>";
    }
?>

<div id="citas-admin">

    <ul class="citas">
        <?php  
            //$idCita = 0;
            foreach($machuelos as $key => $machuelo) { ?>
            <li>
                <p>ID: <span><?php echo $machuelo->id ?></span></p>
                <p>Numero de Parte: <span><?php echo $machuelo->numero_parteM ?></span></p>
                <p>Descripcion: <span><?php echo $machuelo->descripcionM ?></span></p>
                <p>Cantidad en Existencia: <span><?php echo $machuelo->existenciaM ?></span></p>
                <p>Proveedor: <span><?php echo $machuelo->proveedorM ?></span></p>
                <p>Ubicacion: <span><?php echo $machuelo->ubicacionM ?></span></p>
                <p>Foto: <span><?php echo $machuelo->fotoM ?></span></p>
                <div class="foto-pieza">
                    <img src="/machuelosimg/<?php echo $machuelo->fotoM; ?>" alt="imagen machuelo" >
                </div>

                <div class="acciones">
                    <a class="boton" href="/machuelos/actualizar?id=<?php echo $machuelo->id; ?>">Actualizar</a>
                    <form action="/machuelos/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $machuelo->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                </div>

            <?php } // Fin de forEach ?>
    </ul>
    
</div>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>