<h1 class="nombre-pagina">Resultados</h1>

<?php 
    include_once __DIR__ . '/../templates/barra.php'
?>

<h2>Buscar por Descripción</h2>
<div class="busqueda">
    <form action="" class="formulario">
        <div class="campo">
            <label for="descripcion">Descripción</label>
            <input 
                type="text"
                id="descripcion"
                name="descripcion"
                value=""
            >
        </div>
    </form>
</div>

<?php
    if(count($materiales) === 0) {
        echo "<h2>No Hay Material con esa Descripción</h2>";
    }
?>

<div id="citas-admin">

    <ul class="citas">
        <?php  
    
            foreach($materiales as $key => $material) { ?>
            <li>
                <p>ID: <span><?php echo $material->id ?></span></p>
                <p>fecha: <span><?php echo $material->fecha ?></span></p>
                <p>hora: <span><?php echo $material->hora ?></span></p>
                <p>Descripción: <span><?php echo $material->descripcion ?></span></p>
                <p>Medidas: <span><?php echo $material->medidas ?></span></p>
                <p>Tipo de Material: <span><?php echo $material->tipoMaterial ?></span></p>
                <p>Orden de Compra: <span><?php echo $material->ordenCompra ?></span></p>
                <p>Numero de Partida: <span><?php echo $material->partida ?></span></p>
                <p>Proveedor: <span><?php echo $material->proveedor ?></span></p>
                <p>Ubicación: <span><?php echo $material->ubicacion ?></span></p>

                <div class="acciones">
                    <a class="boton" href="/material/actualizar?id=<?php echo $material->id; ?>">Actualizar</a>
                    <form action="/material/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $material->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                </div>

            <?php } // Fin de forEach ?>
    </ul>
    
</div>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>