<?php

namespace Controllers;

use Model\Consumibles;
use MVC\Router;

class ConsumiblesController {
    public static function index(Router $router) {

        session_start();

        isAdmin();

        $consumibles = Consumibles::all();

        $router->render('/consumibles/index', [
            'nombre'=> $_SESSION['nombre'],
            'consumibles' => $consumibles
        ]);
    }

    public static function buscar(Router $router) {
        session_start();

        isAdmin();

        $descripcion = $_GET['descripcion'] ?? '';  
             

        // Consultar la base de datos
        $consulta = "SELECT consumibles.id, consumibles.descripcion, consumibles.cantidad, consumibles.ubicacion";
        $consulta .= " FROM consumibles  ";
        $consulta .= " WHERE descripcion =  '${descripcion}' ";

        //debuguear($consulta);

        $consumibles = Consumibles::SQL($consulta);

         //debuguear($materiales);

        $router->render('consumibles/buscar', [
            'nombre' => $_SESSION['nombre'],
            'consumibles' => $consumibles
            //'nombre' => $nombre
        ]);
    }

    public static function crear(Router $router) {

        session_start();
        isAdmin();
        $consumible = new Consumibles;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $consumible->sincronizar($_POST);
            $alertas = $consumible->validar();
                //debuguear($consumible);
                
                $consumible->guardar();

                header('Location: /consumibles');

            
        }
        
            $router->render('/consumibles/crear', [
            'nombre'=> $_SESSION['nombre'],
            'consumible' => $consumible,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        
        $consumible = Consumibles::find($_GET['id']);
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $consumible->sincronizar($_POST);

            $alertas = $consumible->validar();

            if(empty($alertas)) {
                $consumible->guardar();
                header('Location: /consumibles');
            }
        }

        $router->render('/consumibles/actualizar', [
            'nombre'=> $_SESSION['nombre'],
            'consumible' => $consumible,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router) {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $consumible = Consumibles::find($id);
            $consumible->eliminar();

            header('Location: /consumibles');
        }
    }
}
