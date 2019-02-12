<?php
require_once('app/db/config.php');
require_once('app/modelo/model.php');
require_once('app/modelo/model_producto.php');

$host = Conexion::$metodoConexion;
$usu = Conexion::$usuario;
$pass = Conexion::$contraseña;
$db = Conexion::$nombreBaseDatos;

$conexion = new Producto($host,$usu,$pass,$db);

$camposVacios = $conexion->comprobarCampos($_POST);

if($camposVacios){
    echo "Rellene todos los campos porfavor";
}else {

    


    $conexion->cerrarConexion();
}

?>