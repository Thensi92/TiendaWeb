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
            $productos[$id]['total'] = $cantidad * $productos[$id]['precioProducto']; 
        }
    }
}else if(isset($_GET['ctl']) && $_GET['ctl'] == 'añadirAlCarro'){
    $id = $_GET['id'];

    $cesta->insertarProductoCesta($id);
    $cesta->decrementarCantidadProducto($id);
    header("Location: index.php?ctl=verCesta");

}else if(isset($_GET['ctl']) && $_GET['ctl'] == 'eliminarProductoCesta'){
    $id = $_GET['id'];
    $cesta->borrarProductoCesta($id);
    $cesta->incrementarCantidadProducto($id);
    header("Location: index.php?ctl=verCesta");
}

require_once('app/views/cesta/vista_cesta.php');





