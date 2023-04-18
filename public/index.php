<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\UsuarioController;
use Controllers\LoginController;
use Controllers\ServicioController;
use Controllers\InsertosController;
use Controllers\MachuelosController;
use Controllers\BrocasController;
use MVC\Router;

$router = new Router();

// Iniciar Sesion
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Crear Cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Area Usuario
$router->get('/usuarioS', [UsuarioController::class, 'indexS']);
$router->get('/usuarioS/buscarS', [UsuarioController::class, 'buscarS']);
$router->get('/usuarioI', [UsuarioController::class, 'indexI']);
$router->get('/usuarioI/buscarI', [UsuarioController::class, 'buscarI']);
$router->get('/usuarioM', [UsuarioController::class, 'indexM']);
$router->get('/usuarioM/buscarM', [UsuarioController::class, 'buscarM']);
$router->get('/usuarioB', [UsuarioController::class, 'indexB']);
$router->get('/usuarioB/buscarB', [UsuarioController::class, 'buscarB']);

// ***** Area Administrador *******

// CRUD de Servicios
$router->get('/servicios', [ServicioController::class, 'index']);
$router->get('/servicios/buscar', [ServicioController::class, 'buscar']);
$router->get('/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);

// CRUD de Insertos
$router->get('/insertos', [InsertosController::class, 'index']);
$router->get('/insertos/buscar', [InsertosController::class, 'buscar']);
$router->get('/insertos/crear', [InsertosController::class, 'crear']);
$router->post('/insertos/crear', [InsertosController::class, 'crear']);
$router->get('/insertos/actualizar', [InsertosController::class, 'actualizar']);
$router->post('/insertos/actualizar', [InsertosController::class, 'actualizar']);
$router->post('/insertos/eliminar', [InsertosController::class, 'eliminar']);

// CRUD de Machuelos
$router->get('/machuelos', [MachuelosController::class, 'index']);
$router->get('/machuelos/buscar', [MachuelosController::class, 'buscar']);
$router->get('/machuelos/crear', [MachuelosController::class, 'crear']);
$router->post('/machuelos/crear', [MachuelosController::class, 'crear']);
$router->get('/machuelos/actualizar', [MachuelosController::class, 'actualizar']);
$router->post('/machuelos/actualizar', [MachuelosController::class, 'actualizar']);
$router->post('/machuelos/eliminar', [MachuelosController::class, 'eliminar']);

// CRUD de Brocas
$router->get('/brocas', [BrocasController::class, 'index']);
$router->get('/brocas/buscar', [BrocasController::class, 'buscar']);
$router->get('/brocas/crear', [BrocasController::class, 'crear']);
$router->post('/brocas/crear', [BrocasController::class, 'crear']);
$router->get('/brocas/actualizar', [BrocasController::class, 'actualizar']);
$router->post('/brocas/actualizar', [BrocasController::class, 'actualizar']);
$router->post('/brocas/eliminar', [BrocasController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();