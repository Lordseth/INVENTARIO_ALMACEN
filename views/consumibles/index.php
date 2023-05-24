<h1 class="nombre-pagina">Consumibles</h1>
<p class="descripcion-pagina">Administración de Consumibles</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar por Descripción</h2>
<div class="busqueda">
    <form action="/consumibles/buscar" class="formulario">
        <div class="campo">
            <label for="descripcion">Descripción Consumible</label>
            <input 
                type="text"
                id="descripcion"
                name="descripcion"
            >
        </div>
    </form>
</div>


<ul class="servicios">

<?php foreach($consumibles as $consumible)  { ?>
    
    <li>
        <p>Descripcion: <span><?php echo $consumible->descripcion; ?></span></p>
        <p>Cantidad: <span><?php echo $consumible->cantidad; ?></span></p>
        <p>Ubicación: <span><?php echo $consumible->ubicacion; ?></span></p>

        <div class="acciones">
            <a class="boton" href="/consumibles/actualizar?id=<?php echo $consumible->id; ?>">Actualizar</a>
            <form action="/consumibles/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $consumible->id; ?>">
                <input type="submit" value="Borrar" class="boton-eliminar">
        </form>
        </div>
    </li>

    
   <?php } ?>

</ul>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>