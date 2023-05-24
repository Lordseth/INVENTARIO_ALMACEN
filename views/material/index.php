<h1 class="nombre-pagina">Materia Prima</h1>
<p class="descripcion-pagina">Administración de Materia Prima</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar por Descripción</h2>
<div class="busqueda">
    <form action="/material/buscar" class="formulario">
        <div class="campo">
            <label for="descripcion">Descripción de Material</label>
            <input 
                type="text"
                id="descripcion"
                name="descripcion"
            >
        </div>
    </form>
</div>


<ul class="servicios">

<?php foreach($materiales as $material)  { ?>
    
    <li>
        <p>Fecha: <span><?php echo $material->fecha; ?></span></p>
        <p>Hora: <span><?php echo $material->hora; ?></span></p>
        <p>Descripción: <span><?php echo $material->descripcion; ?></span></p>
        <p>Medidas: <span><?php echo $material->medidas; ?></span></p>
        <p>Tipo de Material: <span><?php echo $material->tipoMaterial; ?></span></p>
        <p>Orden de Compra: <span><?php echo $material->ordenCompra; ?></span></p>
        <p>Numero de Partida: <span><?php echo $material->partida; ?></span></p>
        <p>Proveedor: <span><?php echo $material->proveedor; ?></span></p>
        <p>Ubicación: <span><?php echo $material->ubicacion; ?></span></p>

        <div class="acciones">
            <a class="boton" href="/material/actualizar?id=<?php echo $material->id; ?>">Actualizar</a>
            <form action="/material/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $material->id; ?>">
                <input type="submit" value="Borrar" class="boton-eliminar">
        </form>
        </div>
    </li>

    
   <?php } ?>

</ul>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>