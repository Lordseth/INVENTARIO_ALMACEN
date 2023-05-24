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
    if(count($consumibles) === 0) {
        echo "<h2>No Hay Consumibles con esa Descripción</h2>";
    }
?>

<div id="citas-admin">

    <ul class="citas">
        <?php  
    
            foreach($consumibles as $key => $consumible) { ?>
            <li>
                <p>ID: <span><?php echo $consumible->id ?></span></p>
                <p>Descripción: <span><?php echo $consumible->descripcion ?></span></p>
                <p>Ubicación: <span><?php echo $consumible->ubicacion ?></span></p>

                <div class="acciones">
                    <a class="boton" href="/consumibles/actualizar?id=<?php echo $consumible->id; ?>">Actualizar</a>
                    <form action="/consumibles/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $consumible->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                </div>

            <?php } // Fin de forEach ?>
    </ul>
    
</div>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>