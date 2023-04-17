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
                name="numero_parteI"
                value=""
            >
        </div>
    </form>
</div>

<?php
    if(count($insertos) === 0) {
        echo "<h2>No Hay Insertos con ese numero de parte</h2>";
    }
?>

<div id="citas-admin">

    <ul class="citas">
        <?php  
            //$idCita = 0;
            foreach($insertos as $key => $inserto) { ?>
            <li>
                <p>ID: <span><?php echo $inserto->id ?></span></p>
                <p>Numero de Parte: <span><?php echo $inserto->numero_parteI ?></span></p>
                <p>Descripcion: <span><?php echo $inserto->descripcionI ?></span></p>
                <p>Cantidad en Existencia: <span><?php echo $inserto->existenciaI ?></span></p>
                <p>Proveedor: <span><?php echo $inserto->proveedorI ?></span></p>
                <p>Ubicacion: <span><?php echo $inserto->ubicacionI ?></span></p>
                <p>Foto: <span><?php echo $inserto->fotoI ?></span></p>
                <div class="foto-pieza">
                    <img src="/insertosimg/<?php echo $inserto->fotoI; ?>" alt="imagen inserto" >
                </div>

                <div class="acciones">
                    <a class="boton" href="/insertos/actualizar?id=<?php echo $inserto->id; ?>">Actualizar</a>
                    <form action="/insertos/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $inserto->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                </div>

            <?php } // Fin de forEach ?>
    </ul>
    
</div>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>