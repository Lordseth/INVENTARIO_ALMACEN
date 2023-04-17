<?php

namespace Controllers;

use Model\Insertos;
use MVC\Router;

class InsertosController {
    public static function index(Router $router) {

        session_start();

        isAdmin();

        $insertos = Insertos::all();

        $router->render('/insertos/index', [
            'nombre'=> $_SESSION['nombre'],
            'insertos' => $insertos
        ]);
    }

    public static function buscar(Router $router) {
        session_start();

        isAdmin();

        $numero_ParteI = $_GET['numero_parteI'] ?? '';  
             

        // Consultar la base de datos
        $consulta = "SELECT insertos.id, insertos.numero_parteI, insertos.descripcionI, insertos.existenciaI, insertos.proveedorI, insertos.ubicacionI, insertos.fotoI ";
        $consulta .= " FROM insertos  ";
        $consulta .= " WHERE numero_parteI =  '${numero_ParteI}' ";

        //debuguear($consulta);

        $insertos = Insertos::SQL($consulta);

         //debuguear($insertos);

        $router->render('insertos/buscar', [
            'nombre' => $_SESSION['nombre'],
            'insertos' => $insertos
            //'nombre' => $nombre
        ]);
    }

    public static function crear(Router $router) {

        session_start();
        isAdmin();
        $inserto = new Insertos;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST['fotoI'] = $_FILES['fotoI']['name'];
            $foto = ($_FILES['fotoI']['tmp_name']);

            $inserto->sincronizar($_POST);
            $alertas = $inserto->validar();


                $carpeta_destino = '../public/insertosimg/';

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 

               $archivo_subido = $carpeta_destino . $_FILES['fotoI']['name'];
                move_uploaded_file($foto, $archivo_subido);

                //debuguear($inserto);
                
                $inserto->guardar();

                header('Location: /insertos');

            

        }
        
            $router->render('/insertos/crear', [
            'nombre'=> $_SESSION['nombre'],
            'inserto' => $inserto,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        
        $inserto = Insertos::find($_GET['id']);
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $foto_guardada = $_POST['foto-guardada'];
            $foto = $_FILES['fotoI'];
            

            if(empty($foto['name'])) {
                $foto = $foto_guardada;
                
            } else {
                $carpeta_destino = '../public/insertosimg/';
                unlink($carpeta_destino . $inserto->fotoI);
                $_POST['fotoI'] = $_FILES['fotoI']['name'];
                $foto = ($_FILES['fotoI']['tmp_name']);

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 


               $archivo_subido = $carpeta_destino . $_FILES['fotoI']['name'];
                move_uploaded_file($foto, $archivo_subido);
            }

            $inserto->sincronizar($_POST);

            $alertas = $inserto->validar();

            if(empty($alertas)) {
                $inserto->guardar();
                header('Location: /insertos');
            }
        }

        $router->render('/insertos/actualizar', [
            'nombre'=> $_SESSION['nombre'],
            'inserto' => $inserto,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router) {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $inserto = Insertos::find($id);
            $carpeta_destino = '../public/insertosimg/';
            unlink($carpeta_destino . $inserto->fotoI);
            $inserto->eliminar();

            header('Location: /insertos');
        }
    }
}
