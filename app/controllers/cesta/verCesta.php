<?php
require_once('app/db/config.php');
require_once('app/modelo/model.php');
require_once('app/modelo/model_producto.php');
require_once('app/modelo/model_cesta.php');

$host = Conexion::$metodoConexion;
$usu = Conexion::$usuario;
$pass = Conexion::$contraseña;
$db = Conexion::$nombreBaseDatos;

$cesta = new Cesta($host,$usu,$pass,$db);

$productos = [];

    if(isset($_GET['ctl']) && $_GET['ctl'] == 'verCesta'){
        $productosCesta = $cesta->getCesta();
        
        if(isset($productosCesta)){
            foreach($productosCesta as $id => $cantidad){
                $productos[$id] = $cesta->visualizarProducto($id);
                $productos[$id]['cantidad'] = $cantidad;
                $productos[$id]['totalProducto'] = $cantidad * $productos[$id]['precioProducto']; 
            }
        }

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'añadirAlCarro'){
        $id = $_GET['id'];

        $cesta->insertarProductoCesta($id);
        header("Location: index.php?ctl=verCesta");

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'eliminarProductoCesta'){
        $id = $_GET['id'];
        $cesta->borrarProductoCesta($id);
        header("Location: index.php?ctl=verCesta");

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'eliminarFilaProductoCesta'){
        $id = $_GET['id'];
        $cesta->borrarFilaProductoCesta($id);
        header("Location: index.php?ctl=verCesta");

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'confirmarCompra'){
        $productosCesta = $cesta->getCesta();
        $unidades;
        $idProducto;
        
        if(isset($productosCesta)){
            
            foreach($productosCesta as $id => $cantidad){
                $productos[$id] = $cesta->visualizarProducto($id);
                
                $productos[$id]['cantidad'] = $cantidad;
                $unidades = $productos[$id]['cantidad'];
                
                $idProducto  = $productos[$id]['id'];
                
                $productos[$id]['totalProducto'] = $cantidad * $productos[$id]['precioProducto']; 
                
                //ACTUALIZA LA BASE DE DATOS, UPDATE DE LA CANTIDAD 
                $cesta->updateCantidadProducto($unidades,$idProducto);
            }
            //UNA VEZ ACTUALIZADA LA BASE Y CONFIRMADA LA COMPRA VACIA LA CESTA
            unset($_SESSION['cesta']);

            // Y GENERA EL DOCUMENTO PDF
            //$cesta->generarPDF();
        }
    }

require_once('app/views/cesta/vista_cesta.php');






