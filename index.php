<?php
    session_name('user');
    session_start();

    $arrayGET = [
        //USUARIOS
        'perfilUser' => "app/controllers/usuarios/visualizarPerfil.php",
        'cerrarSesion' => "app/controllers/usuarios/desconectar.php",
        'login' => "app/views/usuarios/login.php",
        'registrar' => "app/views/usuarios/registrarse.php",
        'modificarDatos' => "app/views/usuarios/editarDatos.php",
        //PRODUCTOS
        'verProducto' => "app/controllers/productos/verFichaProducto.php",
        'agregarProducto' => "app/views/productos/vista_insertarProductos.php",
        'editarProducto' => "app/controllers/productos/editarProducto.php",
        'eliminarProducto' => "app/controllers/productos/eliminarProducto.php",
        //CESTA
        'añadirAlCarro' => "app/controllers/cesta/verCesta.php",
        'verCesta' => "app/controllers/cesta/verCesta.php",
        'eliminarProductoCesta' => "app/controllers/cesta/verCesta.php",
        'eliminarFilaProductoCesta' => "app/controllers/cesta/verCesta.php",
        'confirmarCompra' => "app/controllers/cesta/verCesta.php"
    ];

    $arrayPOST = [
        //USUARIOS
        'procesar_login' => "app/controllers/usuarios/login.php",
        'procesar_registro' => "app/controllers/usuarios/crearUsuario.php",
        'procesar_edicion' => "app/controllers/usuarios/editarDatosController.php",
        //PRODUCTOS
        'procesar_insertarProducto' => "app/controllers/productos/insertarProducto.php",
        'procesar_editarProducto' => "app/controllers/productos/editarProducto.php",
    ];

    require_once("web/header/cabecera.php");

        if(empty($_SESSION['datosUser'])){
            require_once("web/nav/nav1.php");
        }else{
            if($_SESSION['datosUser'][5] == "user"){
                require_once("web/nav/nav2.php");
            }else{
                require_once("web/nav/navAdm.php");
            }
        }

        if(isset($_GET['ctl'])){
            foreach($arrayGET as $control => $URI){
                if($_GET['ctl'] == $control){
                    require_once($URI);
                }
            }
        }else{
            require_once("app/views/productos/productos.php");
        }

        require_once("web/footer/menuInferior.php");


        if(isset($_POST)){
            foreach($arrayPOST as $namePOST => $URI){
                if(isset($_POST[$namePOST])){
                    require_once($URI);
                }
            }
        }
    ?>
