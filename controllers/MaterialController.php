<?php

namespace Controllers;

use Model\Materiales;
use MVC\Router;

class MaterialController {
    public static function index(Router $router) {

        session_start();

        isAdmin();

        $materiales = Materiales::all();

        $router->render('/material/index', [
            'nombre'=> $_SESSION['nombre'],
            'materiales' => $materiales
        ]);
    }

    public static function buscar(Router $router) {
        session_start();

        isAdmin();

        $descripcion = $_GET['descripcion'] ?? '';  
             

        // Consultar la base de datos
        $consulta = "SELECT material.id, material.fecha, material.hora, material.descripcion, material.medidas, material.tipoMaterial, material.ordenCompra, material.partida, material.proveedor, material.ubicacion ";
        $consulta .= " FROM material  ";
        $consulta .= " WHERE descripcion =  '${descripcion}' ";

        //debuguear($consulta);

        $materiales = Materiales::SQL($consulta);

         //debuguear($materiales);

        $router->render('material/buscar', [
            'nombre' => $_SESSION['nombre'],
            'materiales' => $materiales
            //'nombre' => $nombre
        ]);
    }

    public static function crear(Router $router) {

        session_start();
        isAdmin();
        $material = new Materiales;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $material->sincronizar($_POST);
            $alertas = $material->validar();
                //debuguear($machuelo);
                
                $material->guardar();

                header('Location: /material');

            
        }
        
            $router->render('/material/crear', [
            'nombre'=> $_SESSION['nombre'],
            'material' => $material,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        
        $material = Materiales::find($_GET['id']);
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $material->sincronizar($_POST);

            $alertas = $material->validar();

            if(empty($alertas)) {
                $material->guardar();
                header('Location: /material');
            }
        }

        $router->render('/material/actualizar', [
            'nombre'=> $_SESSION['nombre'],
            'material' => $material,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router) {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $material = Materiales::find($id);
            $material->eliminar();

            header('Location: /material');
        }
    }
}
