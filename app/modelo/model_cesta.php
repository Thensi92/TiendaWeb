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
        if(isset($_SESSION['cesta'][$id])){
            $_SESSION['cesta'][$id]--;
            
            if($_SESSION['cesta'][$id] == 0){
                unset($_SESSION['cesta'][$id]);
            }
        }
    }

    public function borrarFilaProductoCesta($id){
        if(isset($_SESSION['cesta'][$id])){
            unset($_SESSION['cesta'][$id]);
        }
    }
        

    public function borrarCestaCompleta(){
        unset($_SESSION['cesta']);
    }
}

?>