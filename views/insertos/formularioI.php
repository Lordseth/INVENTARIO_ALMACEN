
<div class="campo">
    <label for="descripcionI">Descripcion:</label>
    <input 
        type="text"
        id="descripcionI"
        placeholder="Descripcion"
        name="descripcionI"
        value="<?php echo $inserto->descripcionI; ?>"
    >
</div>

<div class="campo">
    <label for="numero_parteI">Numero de Parte:</label>
    <input 
        type="text"
        id="numero_parteI"
        placeholder="numero de parte"
        name="numero_parteI"
        value="<?php echo $inserto->numero_parteI; ?>"
    >
</div>

<div class="campo">
    <label for="fotoI">Foto:</label>
    <input type="file" id="fotoI" name="fotoI"> 
    <input type="hidden" name="foto-guardada" value="<?php echo $inserto->fotoI; ?>">
</div>

<?php if($inserto->fotoI) { ?>
        <img src="/insertosimg/<?php echo $inserto->fotoI; ?>" >
    <?php } ?>

<div class="campo">
    <label for="existenciaI">Cantidad en Existencia:</label>
    <input 
        type="number"
        id="existenciaI"
        placeholder="Cantidad en Existencia"
        name="existenciaI"
        value="<?php echo $inserto->existenciaI; ?>"
    >
</div>

<div class="campo">
    <label for="proveedorI">Proveedor:</label>
    <input 
        type="text"
        id="proveedorI"
        placeholder="Proveedor"
        name="proveedorI"
        value="<?php echo $inserto->proveedorI; ?>"
    >
</div>


<div class="campo">
    <label for="ubicacionI">Ubicacion:</label>
    <input 
        type="text"
        id="ubicacionI"
        placeholder="ubicacion"
        name="ubicacionI"
        value="<?php echo $inserto->ubicacionI; ?>"
    >
</div>



