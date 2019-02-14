<?php

Class Cesta extends Producto {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function insertarProductoCesta($id){
        $cantidad = 1;

        if(isset($_SESSION['datosUser']['cesta'][$id])){
            $_SESSION['datosUser']['cesta'][$id]++;
        }else{
            $_SESSION['datosUser']['cesta'][$id] = $cantidad;
        }

    }

    public function getCesta(){
        $productos = [];
        
        if(isset($_SESSION['datosUser']['cesta'])){
            $productos = $_SESSION['datosUser']['cesta'];
        }

        return $productos;
    }

    public function borrarProductoCesta($id){

    }

    public function borrarCestaCompleta(){

    }


}

?>