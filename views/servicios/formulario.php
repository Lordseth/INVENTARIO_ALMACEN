
    <div class="campo">
        <label for="cliente">Cliente:</label>
        <input type="text" id="cliente" placeholder="nombre del cliente" name="cliente" value="<?php echo $servicio->cliente; ?>">
    </div>

    <div class="campo">
        <label for="numero_parte">Numero de Parte:</label>
        <input type="text" id="numero_parte" placeholder="numero de parte" name="numero_parte" value="<?php echo $servicio->numero_parte; ?>">
    </div>

    <div class="campo">
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" placeholder="descripcion de pieza" name="descripcion_pieza" value="<?php echo $servicio->descripcion_pieza; ?>">
    </div>

    <div class="campo">
        <label for="numero_dibujo">Numero de Dibujo:</label>
        <input type="text" id="numero_dibujo" placeholder="numero de dibujo" name="numero_dibujo" value="<?php echo $servicio->numero_dibujo; ?>">
    </div>

    <div class="campo">
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto">
        <input type="hidden" name="foto-guardada" value="<?php echo $servicio->foto; ?>">
    </div>

    <?php if ($servicio->foto) { ?>
        <img src="/fotos/<?php echo $servicio->foto ?>">
    <?php } ?>

    <div class="campo">
        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" placeholder="cantidad" name="cantidad_piezas" value="<?php echo $servicio->cantidad_piezas; ?>">
    </div>

    <div class="campo">
        <label for="ubicacion">Ubicacion:</label>
        <input type="text" id="ubicacion" placeholder="ubicacion" name="ubicacion" value="<?php echo $servicio->ubicacion; ?>">
    </div>

    <div class="campo">
        <label for="material">Tipo de Material:</label>
        <input type="text" id="material" placeholder="tipo de material" name="tipo_material" value="<?php echo $servicio->tipo_material; ?>">
    </div>
