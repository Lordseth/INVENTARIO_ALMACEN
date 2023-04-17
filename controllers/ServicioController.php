<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController {
    public static function index(Router $router) {

        session_start();

        isAdmin();

        $servicios = Servicio::all();

        $router->render('/servicios/index', [
            'nombre'=> $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }

    public static function buscar(Router $router) {
        session_start();

        isAdmin();

        $numeroParte = $_GET['numero_parte'] ?? '';        

        // Consultar la base de datos
        $consulta = "SELECT descripcion.id, descripcion.cliente, descripcion.numero_parte, descripcion.descripcion_pieza, descripcion.numero_dibujo, descripcion.foto, descripcion.cantidad_piezas, descripcion.ubicacion, descripcion.tipo_material ";
        $consulta .= " FROM descripcion  ";
        $consulta .= " WHERE numero_parte =  '${numeroParte}' ";

        //debuguear($consulta);

        $servicios = Servicio::SQL($consulta);

         //debuguear($servicios);

        $router->render('servicios/buscar', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
            //'nombre' => $nombre
        ]);
    }

    public static function crear(Router $router) {

        session_start();
        isAdmin();
        $servicio = new Servicio;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST['foto'] = $_FILES['foto']['name'];
            $foto = ($_FILES['foto']['tmp_name']);

            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();


                $carpeta_destino = '../public/fotos/';

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 

               $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
                move_uploaded_file($foto, $archivo_subido);
                
                $servicio->guardar();

                header('Location: /servicios');

            

        }
        
            $router->render('/servicios/crear', [
            'nombre'=> $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        
        $servicio = Servicio::find($_GET['id']);
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $foto_guardada = $_POST['foto-guardada'];
            $foto = $_FILES['foto'];
            

            if(empty($foto['name'])) {
                $foto = $foto_guardada;
                
            } else {
                $carpeta_destino = '../public/fotos/';
                unlink($carpeta_destino . $servicio->foto);
                $_POST['foto'] = $_FILES['foto']['name'];
                $foto = ($_FILES['foto']['tmp_name']);

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 


               $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
                move_uploaded_file($foto, $archivo_subido);
            }

            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('/servicios/actualizar', [
            'nombre'=> $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router) {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $servicio = Servicio::find($id);
            $carpeta_destino = '../public/fotos/';
            unlink($carpeta_destino . $servicio->foto);
            $servicio->eliminar();

            header('Location: /servicios');
        }
    }
}
