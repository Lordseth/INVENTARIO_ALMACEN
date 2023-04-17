<?php

namespace Model;

class Machuelos extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'machuelos';
    protected static $columnasDB = ['id', 'numero_parteM', 'descripcionM', 'existenciaM', 'proveedorM', 'ubicacionM', 'fotoM'];

    public $id;
    public $numero_parteM;
    public $descripcionM;
    public $existenciaM;
    public $proveedorM;
    public $ubicacionM;
    public $fotoM;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->numero_parteM = $args['numero_parteM'] ?? '';
        $this->descripcionM = $args['descripcionM'] ?? '';
        $this->existenciaM = $args['existenciaM'] ?? '';
        $this->proveedorM = $args['proveedorM'] ?? '';
        $this->ubicacionM = $args['ubicacionM'] ?? '';
        $this->fotoM = $args['fotoM'] ?? '';
    }

    public function validar() {
        if(!$this->numero_parteM) {
            self::$alertas['error'][] = 'El numero de parte es obligatorio';
        }

        if(!$this->existenciaM) {
            self::$alertas['error'][] = 'La cantidad en existencia obligatoria';
        }

        if(!$this->ubicacionM) {
            self::$alertas['error'][] = 'La ubicacion de herramienta es obligatoria';
        }

        return self::$alertas;
    }
}