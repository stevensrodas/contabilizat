<?php 

namespace Model;

use Model\ActiveRecord;

class Rol extends ActiveRecord {
    protected static $tabla = 'rol';
    protected static $columnasDB = ['id', 'rol'];

    public $id;
    public $rol;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->rol = $args['rol'] ?? '';
    }
}