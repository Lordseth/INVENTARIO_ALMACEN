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
                name="numero_parteB"
                value=""
            >
        </div>
    </form>
</div>

<?php
    if(count($brocas) === 0) {
        echo "<h2>No Hay Brocas con ese numero de parte</h2>";
    }
?>

<div id="citas-admin">

    <ul class="citas">
        <?php  
            //$idCita = 0;
            foreach($brocas as $key => $broca) { ?>
            <li>
                <p>ID: <span><?php echo $broca->id ?></span></p>
                <p>Numero de Parte: <span><?php echo $broca->numero_parteB ?></span></p>
                <p>Descripcion: <span><?php echo $broca->descripcionB ?></span></p>
                <p>Cantidad en Existencia: <span><?php echo $broca->existenciaB ?></span></p>
                <p>Proveedor: <span><?php echo $broca->proveedorB ?></span></p>
                <p>Ubicacion: <span><?php echo $broca->ubicacionB ?></span></p>
                <p>Foto: <span><?php echo $broca->fotoB ?></span></p>
                <div class="foto-pieza">
                    <img src="/brocasimg/<?php echo $broca->fotoB; ?>" alt="imagen broca" >
                </div>

                <div class="acciones">
                    <a class="boton" href="/brocas/actualizar?id=<?php echo $broca->id; ?>">Actualizar</a>
                    <form action="/brocas/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $broca->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                </div>

            <?php } // Fin de forEach ?>
    </ul>
    
</div>

<?php 
    //$script = "<script src='build/js/buscadorServicios.js'></script>"
?>