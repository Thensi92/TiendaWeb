<?php
require_once('app/db/config.php');
require_once('app/modelo/model.php');
require_once('app/modelo/model_producto.php');

//CREAMOS LA CONEXION
$host = Conexion::$metodoConexion;
$usu = Conexion::$usuario;
$pass = Conexion::$contraseña;
$db = Conexion::$nombreBaseDatos;

$conexion = new Producto($host,$usu,$pass,$db);

//PROCESAMOS LOS DATOS
$camposVacios = $conexion->comprobarCampos($_POST);

if($camposVacios){
    echo "Rellene todos los campos porfavor";
}else{
    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    $filasAfectas = $conexion->insertarProducto($titulo,$imagen,$precio,$cantidad,$descripcion);

    if($filasAfectas == 1){
        header("Location: index.php");
    }

    $conexion->cerrarConexion();
}
?>