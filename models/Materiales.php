<?php

namespace Model;

class Materiales extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'material';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'descripcion', 'medidas', 'tipoMaterial', 'ordenCompra', 'partida', 'proveedor', 'ubicacion'];

    public $id;
    public $fecha;
    public $hora;
    public $descripcion;
    public $medidas;
    public $tipoMaterial;
    public $ordenCompra;
    public $partida;
    public $proveedor;
    public $ubicacion;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->medidas = $args['medidas'] ?? '';
        $this->tipoMaterial = $args['tipoMaterial'] ?? '';
        $this->ordenCompra = $args['ordenCompra'] ?? '';
        $this->partida = $args['partida'] ?? '';
        $this->proveedor = $args['proveedor'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
    }

}