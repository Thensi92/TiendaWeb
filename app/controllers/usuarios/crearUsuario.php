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
    $email = $_POST['correo'];
    $apodo = $_POST['alias'];
    $pass = $_POST['contrasena'];

    $filasAfectadas= $conexion->registrarUsuario($nombre,$fecha,$email,$apodo,$pass);
    $conexion->cerrarConexion();

    if($filasAfectadas == 1){
        header("Location: index.php");
    }else{
        require_once('app/views/usuarios/errorRegistro.php');
    }
}
?>