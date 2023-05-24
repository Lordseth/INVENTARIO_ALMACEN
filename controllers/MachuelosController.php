<?php

namespace Controllers;

use Model\Machuelos;
use MVC\Router;

class MachuelosController {
    public static function index(Router $router) {

        session_start();

        isAdmin(); 

        $machuelos = Machuelos::all();

        $router->render('/machuelos/index', [
            'nombre'=> $_SESSION['nombre'],
            'machuelos' => $machuelos
        ]);
    }

    public static function buscar(Router $router) {
        session_start();

        isAdmin();

        $numero_ParteM = $_GET['numero_parteM'] ?? '';  
             

        // Consultar la base de datos
        $consulta = "SELECT machuelos.id, machuelos.numero_parteM, machuelos.descripcionM, machuelos.existenciaM, machuelos.proveedorM, machuelos.ubicacionM, machuelos.fotoM ";
        $consulta .= " FROM machuelos  ";
        $consulta .= " WHERE numero_parteM =  '${numero_ParteM}' ";

        //debuguear($consulta);

        $machuelos = Machuelos::SQL($consulta);

         //debuguear($insertos);

        $router->render('machuelos/buscar', [
            'nombre' => $_SESSION['nombre'],
            'machuelos' => $machuelos
            //'nombre' => $nombre
        ]);
    }

    public static function crear(Router $router) {

        session_start();
        isAdmin();
        $machuelo = new Machuelos;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST['fotoM'] = $_FILES['fotoM']['name'];
            $foto = ($_FILES['fotoM']['tmp_name']);

            $machuelo->sincronizar($_POST);
            $alertas = $machuelo->validar();


                $carpeta_destino = '../public/machuelosimg/';

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 


               $archivo_subido = $carpeta_destino . $_FILES['fotoM']['name'];
                move_uploaded_file($foto, $archivo_subido);

                //debuguear($machuelo);
                
                $machuelo->guardar();

                header('Location: /machuelos');

            
        }
        
            $router->render('/machuelos/crear', [
            'nombre'=> $_SESSION['nombre'],
            'machuelo' => $machuelo,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        
        $machuelo = Machuelos::find($_GET['id']);
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $foto_guardada = $_POST['foto-guardada'];
            $foto = $_FILES['fotoM'];
            

            if(empty($foto['name'])) {
                $foto = $foto_guardada;
                
            } else {
                $carpeta_destino = '../public/machuelosimg/';
                unlink($carpeta_destino . $machuelo->fotoM);
                $_POST['fotoM'] = $_FILES['fotoM']['name'];
                $foto = ($_FILES['fotoM']['tmp_name']);

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 


               $archivo_subido = $carpeta_destino . $_FILES['fotoM']['name'];
                move_uploaded_file($foto, $archivo_subido);
            }

            $machuelo->sincronizar($_POST);

            $alertas = $machuelo->validar();

            if(empty($alertas)) {
                $machuelo->guardar();
                header('Location: /machuelos');
            }
        }

        $router->render('/machuelos/actualizar', [
            'nombre'=> $_SESSION['nombre'],
            'machuelo' => $machuelo,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router) {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $machuelo = Machuelos::find($id);
            $carpeta_destino = '../public/machuelosimg/';
            unlink($carpeta_destino . $machuelo->fotoM);
            $machuelo->eliminar();

            header('Location: /machuelos');
        }
    }
}
