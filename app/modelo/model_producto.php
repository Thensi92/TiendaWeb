<?php

Class Producto extends Modelo {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function comprobarCampos($array){
        parent::comprobarCampos($array);
    }

    public function insertarProducto($titulo,$imagen,$precio,$cantidad,$descripcion){
        $rutaImagen = "web/img_products/$imagen";
        //PREPARAMOS LA SENTENCIA
        $sql = "INSERT INTO productos (titulo,imagen,precio,cantidad,descripcion) VALUES(?,?,?,?,?)";
        $stmt = $this->conexion->prepare($sql);

        //ASIGNAMOS VALORES A LA SENTENCIA
        $stmt->bind_param("sssss",$titulo,$rutaImagen,$precio,$cantidad,$descripcion);

        //EJECUTAMOS Y ALMACENAMOS NUMERO DE FILAS AFECTADAS
        $stmt->execute();
        $filasAfectadas = $stmt->affected_rows;
        
        //CERRAMOS LA SENTENCIA
        $stmt->close();

        return $filasAfectadas;
    }

    public function visualizarProducto($id){
        $sql = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param('s',$id);
        $stmt->execute();

        $stmt->bind_result($id,$titulo,$imagen,$precio,$cantidad,$descripcion);
        $stmt->fetch();

        $datosProducto = [
            'id' => $id,
            'titulo' => $titulo,
            'rutaImagen' => $imagen,
            'precioProducto' => $precio,
            'unidadesProducto' => $cantidad,
            'descripcion' => $descripcion
        ];

        $stmt->close();

        return $datosProducto;
    }

    public function actualizarProducto(){
        
    }

    public function eliminarProducto(){
        
    }


    public function cerrarConexion(){
        parent::cerrarConexion();
    }
}

