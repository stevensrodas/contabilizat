<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\cuentastController;
use Controllers\dashboardController;
use Controllers\LoginController;
use Controllers\userController;
use MVC\Router;
$router = new Router();

// Login
$router->get('/', [LoginController::class, 'Login']);
$router->post('/', [LoginController::class, 'Login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Crear cuenta
$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);

//Formulario de olvide mi password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

//Colocar nuevo password
$router->get('/reestablecer', [LoginController::class, 'reestablecer']);
$router->post('/reestablecer', [LoginController::class, 'reestablecer']);

// Confirmacion de cuenta 
$router->get('/mensaje', [LoginController::class, 'mensaje']);
$router->get('/confirmar', [LoginController::class, 'confirmar']);

//ZONA DEL DASHBOARD
$router->get('/dashboard', [dashboardController::class, 'index']);
$router->get('/crear-instituto', [dashboardController::class, 'crear_instituto']);
$router->post('/crear-instituto', [dashboardController::class, 'crear_instituto']);
$router->get('/instituto', [dashboardController::class, 'instituto']);
$router->get('/crear-usuarios', [dashboardController::class, 'crear_usuarios']);
$router->post('/crear-usuarios', [dashboardController::class, 'crear_usuarios']);
$router->get('/usuarios', [dashboardController::class, 'usuarios']);
$router->get('/perfil', [dashboardController::class, 'perfil']);
$router->get('/cambiar-password', [dashboardController::class, 'cambiar_password']);
$router->post('/cambiar-password', [dashboardController::class, 'cambiar_password']);
$router->post('/perfil', [dashboardController::class, 'perfil']);

//API para usuarios
$router->post('/api/usuario/eliminar', [userController::class, 'eliminar']);

//Vista para las cuentas T
$router->get('/NIC', [cuentastController::class, 'NIC']);
$router->get('/NIF', [cuentastController::class, 'NIF']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();