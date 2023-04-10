<?php

namespace Model;

class Servicio extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'descripcion';
    protected static $columnasDB = ['id', 'cliente', 'numero_parte', 'descripcion_pieza', 'numero_dibujo', 'foto', 'cantidad_piezas', 'ubicacion', 'tipo_material'];

    public $id;
    public $cliente;
    public $numero_parte;
    public $descripcion_pieza;
    public $numero_dibujo;
    public $foto;
    public $cantidad_piezas;
    public $ubicacion;
    public $tipo_material;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->cliente = $args['cliente'] ?? '';
        $this->numero_parte = $args['numero_parte'] ?? '';
        $this->descripcion_pieza = $args['descripcion_pieza'] ?? '';
        $this->numero_dibujo = $args['numero_dibujo'] ?? '';
        $this->foto = $args['foto'] ?? '';
        $this->cantidad_piezas = $args['cantidad_piezas'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
        $this->tipo_material = $args['tipo_material'] ?? '';
    }

    public function validar() {
        if(!$this->cliente) {
            self::$alertas['error'][] = 'El nombre del Cliente es obligatorio';
        }

        if(!$this->descripcion_pieza) {
            self::$alertas['error'][] = 'La descripcion de pieza es obligatorio';
        }

        if(!$this->cantidad_piezas) {
            self::$alertas['error'][] = 'La cantidad de piezas es obligatoria';
        }

        if(!$this->ubicacion) {
            self::$alertas['error'][] = 'La ubicacion de pieza es obligatoria';
        }

        if(!$this->tipo_material) {
            self::$alertas['error'][] = 'El tipo de material es obligatorio';
        }

        return self::$alertas;
    }
}