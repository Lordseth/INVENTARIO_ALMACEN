<div class="campo">
    <label for="descripcionM">Descripcion:</label>
    <input 
        type="text"
        id="descripcionM"
        placeholder="Descripcion"
        name="descripcionM"
        value="<?php echo $machuelo->descripcionM; ?>"
    >
</div>

<div class="campo">
    <label for="numero_parteI">Numero de Parte:</label>
    <input type="text"id="numero_parteM"placeholder="numero de parte"name="numero_parteM"value="<?php echo$machuelo->numero_parteM; ?>">
</div>

<div class="campo">
    <label for="fotoM">Foto:</label>
    <input type="file" id="fotoM" name="fotoM"> 
    <input type="hidden" name="foto-guardada" value="<?php echo $machuelo->fotoM; ?>">
</div>

<?php if($machuelo->fotoM) { ?>
        <img src="/machuelosimg/<?php echo $machuelo->fotoM; ?>" >
    <?php } ?>

<div class="campo">
    <label for="existenciaM">Cantidad en Existencia:</label>
    <input 
        type="number"
        id="existenciaM"
        placeholder="Cantidad en Existencia"
        name="existenciaM"
        value="<?php echo $machuelo->existenciaM; ?>"
    >
</div>

<div class="campo">
    <label for="proveedorM">Proveedor:</label>
    <input 
        type="text"
        id="proveedorM"
        placeholder="Proveedor"
        name="proveedorM"
        value="<?php echo $machuelo->proveedorM; ?>"
    >
</div>


<div class="campo">
    <label for="ubicacionM">Ubicacion:</label>
    <input 
        type="text"
        id="ubicacionM"
        placeholder="ubicacion"
        name="ubicacionM"
        value="<?php echo $machuelo->ubicacionM; ?>"
    >
</div>



