<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class dashboardController
{
    public static function index(Router $router)
    {

        session_start();
        isAuth();

        $instituto = Usuario::belongsTo('rol', 2);

        $router->render('dashboard/index', [
            'titulo' => 'Dashboard',
            'contenido' => '',
            'instituto' => $instituto
        ]);
    }

    public static function crear_instituto(Router $router)
    {
        session_start();
        isAuth();
        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $existeAdmin = Usuario::where('email', $usuario->email);

                if($existeAdmin) {
                    Usuario::setAlerta('error', 'El Instituto ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el Token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if ($resultado) {
                        Usuario::setAlerta('exito', 'Instituto creado correctamente');
                        $alertas = $usuario->getAlertas();
                        header('Location: /instituto?nombre=' . $usuario->nombre);
                    }
                }
            }
        }

        // Render a la vista
        $router->render('dashboard/crear-instituto', [
            'titulo' => 'Crea Administrador del Instituto',
            'usuario' => $usuario,
            'contenido' => '',
            'alertas' => $alertas
        ]);
    }
    //vista de almacen
    public static function instituto(Router $router)
    {
        session_start();
        isAuth();

        $query = "SELECT * FROM usuarios WHERE rol = 2 AND confirmado = 1";

        $instituto = Usuario::consultarSQL($query);

        $router->render('dashboard/instituto', [
            'titulo' => 'Listado de Institutos',
            'contenido' => '',
            'instituto' => $instituto
        ]);
    }

    public static function perfil(Router $router)
    {
        session_start();
        isAuth();

        $alertas = [];

        $usuario = Usuario::find($_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar_Perfil();

            if (empty($alertas)) {

                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario && $existeUsuario->id !== $usuario->id) {
                    //Mensaje de error
                    Usuario::setAlerta('error', 'Email ya registrado con otra cuenta');
                    $alertas = $usuario->getAlertas();
                } else {
                    //Guardar el registro

                    $usuario->guardar();

                    Usuario::setAlerta('exito', 'Guardado correctamente');
                    $alertas = $usuario->getAlertas();

                    //Asignar nombre nuevo a la barra
                    $_SESSION['nombre'] = $usuario->nombre;
                }
            }
        }
        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil',
            'contenido' => '',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function cambiar_password(Router $router)
    {
        session_start();
        isAuth();

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = Usuario::find($_SESSION['id']);

            //sincronizar con los datos del usuario
            $usuario->sincronizar($_POST);

            $alertas = $usuario->nuevo_password();

            if (empty($alertas)) {
                $resultado = $usuario->comprobar_password();

                if ($resultado) {
                    $usuario->password = $usuario->password_nuevo;

                    //Eliminar propiedads no necesarias
                    unset($usuario->password_nuevo);
                    unset($usuario->password_actual);

                    //hasshear nuevo password
                    $usuario->hashPassword();

                    //Actualizar 
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        Usuario::setAlerta('exito', 'Password guardado correctamente');
                        $alertas = $usuario->getAlertas();
                    }
                } else {
                    Usuario::setAlerta('error', 'Password incorrecto');
                    $alertas = $usuario->getAlertas();
                }
            }
        }

        $router->render('dashboard/cambiar-password', [
            'titulo' => 'Perfil',
            'contenido' => '',
            'alertas' => $alertas
        ]);
    }
    public static function crear_usuarios(Router $router)
    {
        session_start();
        isAuth();
        $alertas = [];

        $usuario = new Usuario;


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $existeEmail = Usuario::where('email', $usuario->email);

                if ($existeEmail) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el Token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if ($resultado) {
                        Usuario::setAlerta('exito', 'Usuario creado correctamente');
                        $alertas = $usuario->getAlertas();
                    }
                }
            }
        }

        $router->render('dashboard/crear-usuarios', [
            'titulo' => 'Crear Usuarios',
            'contenido' => '',
            'alertas' => $alertas
        ]);
    }
    public static function usuarios(Router $router){

        session_start();
        isAuth();
        $alertas = [];

        //Tabla de usuarios
        $alertas = [];
        $id_admin = $_SESSION['id'];
        $usuarios = Usuario::belongsTo('confirmado', 1);
        $totalPaginas = 0;
        if ($id_admin == 9) {

            $registros = count($usuarios);

            $registrosPorPagina = 5; // Número de registros por página
            $totalPaginas = ceil($registros / $registrosPorPagina); // Calcula el total de páginas

            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

            $offset = ($paginaActual - 1) * $registrosPorPagina;

            $query = "SELECT * FROM usuarios WHERE rol NOT IN (1) AND confirmado = 1 LIMIT $registrosPorPagina OFFSET $offset";

            $usuarios = Usuario::consultarSQL($query);
        } else {
            $usuarios = Usuario::belongsTo('usuario_instituto', $id_admin);
        }

        $router->render('dashboard/usuarios', [
            'titulo' => 'Listado de Usuarios',
            'contenido' => '',
            'alertas' => $alertas,
            'usuarios' => $usuarios,
            'totalPaginas' => $totalPaginas
        ]);
    }
}

