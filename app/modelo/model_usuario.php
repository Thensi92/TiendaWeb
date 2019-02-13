<?php

Class Usuario extends Modelo {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function comprobarCampos($array){
        parent::comprobarCampos($array);
    }

    public function registrarUsuario($nombre,$fecha,$email,$apodo,$pass){
        
        $filasAfectadas;
        $rol = "user";

        //PREPARAMOS LA SENTENCIA
        $sql = "INSERT INTO usuarios (nombre,fecha,email,apodo,contrasena,rol) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conexion->prepare($sql);

        //ASIGNAMOS VALORES A LA SENTENCIA
        $stmt->bind_param("ssssss",$nombre,$fecha,$email,$apodo,$pass,$rol);

        //EJECUTAMOS Y ALMACENAMOS NUMERO DE FILAS AFECTADAS
        $stmt->execute();
        $filasAfectadas = $stmt->affected_rows;
        
        //CERRAMOS LA SENTENCIA
        $stmt->close();

        return $filasAfectadas;
    }

    public function loginUsuario($email,$pass){

        $filasAfectadas;

        //PREPARO LA SENTENCIA
        $sql = "SELECT email,contrasena FROM usuarios 
                WHERE email = ? AND contrasena = ?";
                
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss",$email,$pass);
        
        //EJECUTAMOS LA SENTENCIA
        $stmt->execute();
        $stmt->store_result();
        $filasAfectadas = $stmt->num_rows;

        $stmt->close();

        return $filasAfectadas;
    }

    public function visualizarDatosUser($email,$pass){
        //PREPARO LA SENTENCIA
        $sql = "SELECT * FROM usuarios 
                WHERE email = ? AND contrasena = ?";
                
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss",$email,$pass);
        
        //EJECUTAMOS LA SENTENCIA
        $stmt->execute();

        $stmt->bind_result($nombre,$fecha,$email,$apodo,$pass,$rol);
        $stmt->fetch();
        $array = [$nombre,$fecha,$email,$apodo,$pass,$rol];
        $stmt->close();

        return $array;
    }

    public function actualizarDatos($nombre,$fecha,$apodo,$pass) {
        $correoSesion = $_SESSION['datosUser'][2];

        $sql = "UPDATE usuarios SET nombre = ?, fecha = ?, apodo = ?, contrasena = ? WHERE email = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sssss",$nombre,$fecha,$apodo,$pass,$correoSesion);

        $stmt->execute();
        $stmt->close();
    }

    public function cerrarConexion(){
        parent::cerrarConexion();
    }
}

