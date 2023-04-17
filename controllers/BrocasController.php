<?php

namespace Controllers;

use Model\Brocas;
use MVC\Router;

class BrocasController {
    public static function index(Router $router) {

        session_start();

        isAdmin();

        $brocas = Brocas::all();

        $router->render('/brocas/index', [
            'nombre'=> $_SESSION['nombre'],
            'brocas' => $brocas
        ]);
    }

    public static function buscar(Router $router) {
        session_start();

        isAdmin();

        $numero_ParteB = $_GET['numero_parteB'] ?? '';  
             

        // Consultar la base de datos
        $consulta = "SELECT brocas.id, brocas.numero_parteB, brocas.descripcionB, brocas.existenciaB, brocas.proveedorB, brocas.ubicacionB, brocas.fotoB ";
        $consulta .= " FROM brocas ";
        $consulta .= " WHERE numero_parteB =  '${numero_ParteB}' ";

        //debuguear($consulta);

        $brocas = Brocas::SQL($consulta);

         //debuguear($insertos);

        $router->render('brocas/buscar', [
            'nombre' => $_SESSION['nombre'],
            'brocas' => $brocas
            //'nombre' => $nombre
        ]);
    }

    public static function crear(Router $router) {

        session_start();
        isAdmin();
        $broca = new Brocas;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST['fotoB'] = $_FILES['fotoB']['name'];
            $foto = ($_FILES['fotoB']['tmp_name']);

            $broca->sincronizar($_POST);
            $alertas = $broca->validar();


                $carpeta_destino = '../public/brocasimg/';

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 


               $archivo_subido = $carpeta_destino . $_FILES['fotoB']['name'];
                move_uploaded_file($foto, $archivo_subido);

                //debuguear($machuelo);
                
                $broca->guardar();

                header('Location: /brocas');

            
        }
        
            $router->render('/brocas/crear', [
            'nombre'=> $_SESSION['nombre'],
            'broca' => $broca,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        
        $broca = Brocas::find($_GET['id']);
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $foto_guardada = $_POST['foto-guardada'];
            $foto = $_FILES['fotoB'];
            

            if(empty($foto['name'])) {
                $foto = $foto_guardada;
                
            } else {
                $carpeta_destino = '../public/brocasimg/';
                unlink($carpeta_destino . $broca->fotoB);
                $_POST['fotoB'] = $_FILES['fotoB']['name'];
                $foto = ($_FILES['fotoB']['tmp_name']);

               if(!is_dir($carpeta_destino)) {
                mkdir($carpeta_destino);
               } 


               $archivo_subido = $carpeta_destino . $_FILES['fotoB']['name'];
                move_uploaded_file($foto, $archivo_subido);
            }

            $broca->sincronizar($_POST);

            $alertas = $broca->validar();

            if(empty($alertas)) {
                $broca->guardar();
                header('Location: /brocas');
            }
        }

        $router->render('/brocas/actualizar', [
            'nombre'=> $_SESSION['nombre'],
            'broca' => $broca,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router) {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $broca = Brocas::find($id);
            $carpeta_destino = '../public/brocasimg/';
            unlink($carpeta_destino . $broca->fotoB);
            $broca->eliminar();

            header('Location: /brocas');
        }
    }
}
