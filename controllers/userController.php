<?php 

namespace Controllers;

use Model\Usuario;

class userController{
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = new Usuario($_POST);

            $resultado = $id->eliminar();

            $resultado = [
                'resultado' => $resultado,
                'mensaje' => 'Eliminado correctamente'
            ];

            echo json_encode($resultado);
        }
    }
}