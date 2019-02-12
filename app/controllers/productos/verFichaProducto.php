<?php
require_once('app/db/config.php');
require_once('app/modelo/model.php');
require_once('app/modelo/model_producto.php');

$host = Conexion::$metodoConexion;
$usu = Conexion::$usuario;
$pass = Conexion::$contraseña;
$db = Conexion::$nombreBaseDatos;

$conexion = new Producto($host,$usu,$pass,$db);

if(empty($_GET)){
    echo "No hay producto";
}else {
    $datosDelProducto = $conexion->visualizarProducto($_GET["id"]);

    require_once('app/views/productos/vista_fichaProducto.php');

    $conexion->cerrarConexion();
}

?>