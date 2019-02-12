<?php
require_once('app/db/config.php');
require_once('app/modelo/model.php');
require_once('app/modelo/model_usuario.php');

//CREAMOS LA CONEXION
$host = Conexion::$metodoConexion;
$usu = Conexion::$usuario;
$pass = Conexion::$contraseña;
$db = Conexion::$nombreBaseDatos;

$conexion = new Usuario($host,$usu,$pass,$db);

//PROCESAMOS LOS DATOS
$camposVacios = $conexion->comprobarCampos($_POST);

if($camposVacios){
    echo "Rellene todos los campos porfavor";
}else{
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $apodo = $_POST['alias'];
    $correoSesion = $_SESSION['datosUser'][2];
    $pass = $_POST['contrasena'];

    $conexion->actualizarDatos($nombre,$fecha,$apodo,$pass);
    $_SESSION['datosUser'] = $conexion->visualizarDatosUser($correoSesion,$pass);
    header("Location: index.php?ctl=perfilUser");
    
    $conexion->cerrarConexion();
}

?>