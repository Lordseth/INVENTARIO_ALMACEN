<div class="campo">
    <label for="numero_parteB">Numero de Parte:</label>
    <input type="text"id="numero_parteB"placeholder="numero de parte"name="numero_parteB"value="<?php echo$broca->numero_parteB; ?>">
</div>

<div class="campo">
    <label for="descripcionB">Descripcion:</label>
    <input 
        type="text"
        id="descripcionB"
        placeholder="Descripcion"
        name="descripcionB"
        value="<?php echo $broca->descripcionB; ?>"
    >
</div>

<div class="campo">
    <label for="existenciaB">Cantidad en Existencia:</label>
    <input 
        type="number"
        id="existenciaB"
        placeholder="Cantidad en Existencia"
        name="existenciaB"
        value="<?php echo $broca->existenciaB; ?>"
    >
</div>

<div class="campo">
    <label for="proveedorB">Proveedor:</label>
    <input 
        type="text"
        id="proveedorB"
        placeholder="Proveedor"
        name="proveedorB"
        value="<?php echo $broca->proveedorB; ?>"
    >
</div>


<div class="campo">
    <label for="ubicacionM">Ubicacion:</label>
    <input 
        type="text"
        id="ubicacionB"
        placeholder="ubicacion"
        name="ubicacionB"
        value="<?php echo $broca->ubicacionB; ?>"
    >
</div>

<div class="campo">
    <label for="fotoB">Foto:</label>
    <input type="file" id="fotoB" name="fotoB"> 
    <input type="hidden" name="foto-guardada" value="<?php echo $broca->fotoB; ?>">
</div>

<?php if($broca->fotoB) { ?>
        <img src="/brocasimg/<?php echo $broca->fotoB; ?>" >
    <?php } ?>

