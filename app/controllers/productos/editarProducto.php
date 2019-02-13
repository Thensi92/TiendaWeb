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

    if(!empty($_GET['id'])){
        $datosdelProducto = $conexion->visualizarProducto($_GET['id']);
        $id = $datosdelProducto['id'];
        $titulo = $datosdelProducto['titulo'];
        $imagen = $datosdelProducto['rutaImagen'];
        $precio = $datosdelProducto['precioProducto'];
        $cantidad = $datosdelProducto['unidadesProducto'];
        $descripcion = $datosdelProducto['descripcion'];

        require_once('app/views/productos/vista_editarProducto.php');
    }

    if($_POST){
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $imagen = $_POST['imagen'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];

        $conexion->actualizarProducto($id,$titulo,$imagen,$precio,$cantidad,$descripcion);

        header("Location: index.php");
    }



    $conexion->cerrarConexion();
}

?>