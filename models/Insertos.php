<?php

namespace Model;

class Insertos extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'insertos';
    protected static $columnasDB = ['id', 'numero_parteI', 'descripcionI', 'existenciaI', 'proveedorI', 'ubicacionI', 'fotoI'];

    public $id;
    public $numero_parteI;
    public $descripcionI;
    public $existenciaI;
    public $proveedorI;
    public $ubicacionI;
    public $fotoI;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->numero_parteI = $args['numero_parteI'] ?? '';
        $this->descripcionI = $args['descripcionI'] ?? '';
        $this->existenciaI = $args['existenciaI'] ?? '';
        $this->proveedorI = $args['proveedorI'] ?? '';
        $this->ubicacionI = $args['ubicacionI'] ?? '';
        $this->fotoI = $args['fotoI'] ?? '';
    }

    public function validar() {
        if(!$this->numero_parteI) {
            self::$alertas['error'][] = 'El numero de parte es obligatorio';
        }

        if(!$this->existenciaI) {
            self::$alertas['error'][] = 'La cantidad en existencia obligatoria';
        }

        if(!$this->ubicacionI) {
            self::$alertas['error'][] = 'La ubicacion de herramienta es obligatoria';
        }

        return self::$alertas;
    }
}