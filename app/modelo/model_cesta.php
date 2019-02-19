<?php

Class Cesta extends Producto {

    function __construct($host,$usu,$pass,$db){
        parent:: __construct($host,$usu,$pass,$db);
    }

    public function insertarProductoCesta($id){
        $cantidad = 1;

        if(isset($_SESSION['cesta'][$id])){
            $_SESSION['cesta'][$id]++;
        }else{
            $_SESSION['cesta'][$id] = $cantidad;
        }

    }

    public function getCesta(){
        $productos = [];
        
        if(isset($_SESSION['cesta'])){
            $productos = $_SESSION['cesta'];
        }

        return $productos;
    }

    public function borrarProductoCesta($id){

    }

    public function borrarCestaCompleta(){

    }


}

?>