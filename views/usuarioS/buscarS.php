<h1 class="nombre-pagina">Resultados</h1>

<?php 
    include_once __DIR__ . '/../templates/barra.php'
?>

<h2>Buscar por numero de parte</h2>
<div class="busqueda">
    <form action="" class="formulario">
        <div class="campo">
            <label for="pieza">Numero de Parte</label>
            <input 
                type="text"
                id="pieza"
                name="numero_parte"
                value=""
            >
        </div>
    </form>
</div>

<?php
    if(count($servicios) === 0) {
        echo "<h2>No Hay Piezas con ese numero de parte</h2>";
    }
?>

<div id="citas-admin">

    <ul class="citas">
        <?php  
            //$idCita = 0;
            foreach($servicios as $key => $servicio) { ?>
            <li>
                <p>ID: <span><?php echo $servicio->id ?></span></p>
                <p>Cliente: <span><?php echo $servicio->cliente ?></span></p>
                <p>Numero de Parte: <span><?php echo $servicio->numero_parte ?></span></p>
                <p>Descripcion: <span><?php echo $servicio->descripcion_pieza ?></span></p>
                <p>Numero de Dibujo: <span><?php echo $servicio->numero_dibujo ?></span></p>
                <p>Foto: <span><?php echo $servicio->foto ?></span></p>
                <div class="foto-pieza">
                    <img src="/fotos/<?php echo $servicio->foto; ?>" alt="imagen pieza" >
                </div>
                <p>Cantidad: <span><?php echo $servicio->cantidad_piezas ?></span></p>
                <p>Ubicacion: <span><?php echo $servicio->ubicacion ?></span></p>
                <p>Tipo de Material: <span><?php echo $servicio->tipo_material ?></span></p>


            <?php } // Fin de forEach ?>
    </ul>
    
</div>

<?php 
    $script = "<script src='build/js/buscadorServicios.js'></script>"
?>