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
    $email = $_POST['email'];
    $pass = $_POST['contrasena'];

    $filasAfectadas= $conexion->loginUsuario($email,$pass);
    
    if($filasAfectadas == 1){
        $_SESSION['datosUser'] = $conexion->visualizarDatosUser($email,$pass);
        header("Location: index.php");
    }else{
        require_once('app/views/usuarios/errorLogin.php');
    }
    
    $conexion->cerrarConexion();
}
?>