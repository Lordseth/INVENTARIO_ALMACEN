
<div class="campo">
        <label for="fecha">Fecha</label>
        <input 
            type="date"
            id="fecha"
            name="fecha"
            value="<?php echo $material->fecha; ?>"
        >
    </div>

    <div class="campo">
        <label for="hora">Hora</label>
        <input 
            type="time"
            id="hora"
            name="hora"
            value="<?php echo $material->hora; ?>"
        >
    </div>

<div class="campo">
    <label for="descripcionM">Descripcion:</label>
    <input 
        type="text"
        id="descripcion"
        placeholder="Descripcion"
        name="descripcion"
        value="<?php echo $material->descripcion; ?>"
    >
</div>

<div class="campo">
    <label for="medidas">Medidas:</label>
    <input type="text"id="medidas"placeholder="Medidas"name="medidas"value="<?php echo$material->medidas; ?>">
</div>

<div class="campo">
    <label for="tipoMaterial">Tipo de Material:</label>
    <input 
        type="text"
        id="tipoMaterial"
        placeholder="Tipo de Material"
        name="tipoMaterial"
        value="<?php echo $material->tipoMaterial; ?>"
    >
</div>

<div class="campo">
    <label for="ordenCompra">Orden de Compra:</label>
    <input 
        type="text"
        id="ordenCompra"
        placeholder="Orden de Compra"
        name="ordenCompra"
        value="<?php echo $material->ordenCompra; ?>"
    >
</div>


<div class="campo">
    <label for="partida">Partida:</label>
    <input 
        type="text"
        id="partida"
        placeholder="No. de Partida"
        name="partida"
        value="<?php echo $material->partida; ?>"
    >
</div>

<div class="campo">
    <label for="proveedor">Proveedor:</label>
    <input 
        type="text"
        id="proveedor"
        placeholder="Proveedor"
        name="proveedor"
        value="<?php echo $material->proveedor; ?>"
    >
</div>

<div class="campo">
    <label for="ubicacion">Ubicación:</label>
    <input 
        type="text"
        id="ubicacion"
        placeholder="Ubicación"
        name="ubicacion"
        value="<?php echo $material->ubicacion; ?>"
    >
</div>
    



