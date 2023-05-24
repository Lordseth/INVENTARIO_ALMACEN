<?php

namespace Model;

class Consumibles extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'consumibles';
    protected static $columnasDB = ['id', 'descripcion', 'cantidad', 'ubicacion'];

    public $id;
    public $descripcion;
    public $cantidad;
    public $ubicacion;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
    }

}