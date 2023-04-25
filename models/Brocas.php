<?php

namespace Model;

class Brocas extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'brocas';
    protected static $columnasDB = ['id', 'numero_parteB', 'descripcionB', 'existenciaB', 'proveedorB', 'ubicacionB', 'fotoB'];

    public $id;
    public $numero_parteB;
    public $descripcionB;
    public $existenciaB;
    public $proveedorB;
    public $ubicacionB;
    public $fotoB;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->numero_parteB = $args['numero_parteB'] ?? '';
        $this->descripcionB = $args['descripcionB'] ?? '';
        $this->existenciaB = $args['existenciaB'] ?? '';
        $this->proveedorB = $args['proveedorB'] ?? '';
        $this->ubicacionB = $args['ubicacionB'] ?? '';
        $this->fotoB = $args['fotoB'] ?? '';
    }

    public function validar() {
        if(!$this->numero_parteB) {
            self::$alertas['error'][] = 'El numero de parte es obligatorio';
        }


        if(!$this->ubicacionB) {
            self::$alertas['error'][] = 'La ubicacion de herramienta es obligatoria';
        }

        return self::$alertas;
    }
}