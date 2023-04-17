<?php

namespace Controllers;

use Model\Servicio;
use Model\Insertos;
use Model\Machuelos;
use MVC\Router;

class UsuarioController {
    public static function indexS(Router $router) {

        session_start();


        $servicios = Servicio::all();

        $router->render('/usuarioS/indexS', [
            'nombre'=> $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }

    public static function indexI(Router $router) {

        session_start();


        $insertos = Insertos::all();

        $router->render('/usuarioI/indexI', [
            'nombre'=> $_SESSION['nombre'],
            'insertos' => $insertos
        ]);
    }

    public static function indexM(Router $router) {

        session_start();


        $machuelos = Machuelos::all();

        $router->render('/usuarioM/indexM', [
            'nombre'=> $_SESSION['nombre'],
            'machuelos' => $machuelos
        ]);
    }

    public static function buscarS(Router $router) {
        session_start();


        $numeroParte = $_GET['numero_parte'] ?? '';        

        // Consultar la base de datos
        $consulta = "SELECT descripcion.id, descripcion.cliente, descripcion.numero_parte, descripcion.descripcion_pieza, descripcion.numero_dibujo, descripcion.foto, descripcion.cantidad_piezas, descripcion.ubicacion, descripcion.tipo_material ";
        $consulta .= " FROM descripcion  ";
        $consulta .= " WHERE numero_parte =  '${numeroParte}' ";

        $servicios = Servicio::SQL($consulta);

        // debuguear($servicios);

        $router->render('usuarioS/buscarS', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
            //'nombre' => $nombre
        ]);
    }

    public static function buscarI(Router $router) {
        session_start();


        $numeroParte = $_GET['numero_parteI'] ?? '';        

        // Consultar la base de datos
        $consulta = "SELECT insertos.id, insertos.numero_parteI, insertos.descripcionI, insertos.existenciaI, insertos.proveedorI, insertos.ubicacionI, insertos.fotoI ";
        $consulta .= " FROM insertos  ";
        $consulta .= " WHERE numero_parteI =  '${numeroParte}' ";

        $insertos = Insertos::SQL($consulta);

        // debuguear($insertos);

        $router->render('usuarioI/buscarI', [
            'nombre' => $_SESSION['nombre'],
            'insertos' => $insertos
            //'nombre' => $nombre
        ]);
    }

    public static function buscarM(Router $router) {
        session_start();


        $numeroParte = $_GET['numero_parteM'] ?? '';        

        // Consultar la base de datos
        $consulta = "SELECT machuelos.id, machuelos.numero_parteM, machuelos.descripcionM, machuelos.existenciaM, machuelos.proveedorM, machuelos.ubicacionM, machuelos.fotoM ";
        $consulta .= " FROM machuelos  ";
        $consulta .= " WHERE numero_parteM =  '${numeroParte}' ";

        $machuelos = Machuelos::SQL($consulta);

        // debuguear($insertos);

        $router->render('usuarioM/buscarM', [
            'nombre' => $_SESSION['nombre'],
            'machuelos' => $machuelos
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
