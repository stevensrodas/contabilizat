<?php 

namespace Controllers;

use MVC\Router;

class cuentastController{
    public static function NIC(Router $router){

        session_start();
        isAuth();

        $router->render('dashboard/NIC', [
            'titulo' => 'NIC - NORMAS INTERNACIONALES DE CONTABILIDAD',
            'contenido' => 'IAS - INTERNATIONAL ACCOUNTING STANDARDS'
        ]);
    }
    public static function NIF(Router $router){

        session_start();
        isAuth();

        $router->render('dashboard/NIF', [
            'titulo' => 'NIIF - NORMAS INTERNACIONALES DE INFORMACIÓN FINANCIERA',
            'contenido' => 'IFRS - INTERNATIONAL FINANCIAL REPORTING STANDARDS'
        ]);
    }
}