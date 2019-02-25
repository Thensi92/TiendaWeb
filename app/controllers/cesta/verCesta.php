<?php
require_once('app/db/config.php');
require_once('app/modelo/model.php');
require_once('app/modelo/model_producto.php');
require_once('app/modelo/model_cesta.php');

$host = Conexion::$metodoConexion;
$usu = Conexion::$usuario;
$pass = Conexion::$contraseña;
$db = Conexion::$nombreBaseDatos;

$cesta = new Cesta($host,$usu,$pass,$db);

$productos = [];

    if(isset($_GET['ctl']) && $_GET['ctl'] == 'verCesta'){
        $productosCesta = $cesta->getCesta();
        
        if(isset($productosCesta)){
            foreach($productosCesta as $id => $cantidad){
                $productos[$id] = $cesta->visualizarProducto($id);
                $productos[$id]['cantidad'] = $cantidad;
                $productos[$id]['totalProducto'] = $cantidad * $productos[$id]['precioProducto']; 
            }
        }

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'añadirAlCarro'){
        $id = $_GET['id'];

        $cesta->insertarProductoCesta($id);
        header("Location: index.php?ctl=verCesta");

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'eliminarProductoCesta'){
        $id = $_GET['id'];
        $cesta->borrarProductoCesta($id);
        header("Location: index.php?ctl=verCesta");

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'eliminarFilaProductoCesta'){
        $id = $_GET['id'];
        $cesta->borrarFilaProductoCesta($id);
        header("Location: index.php?ctl=verCesta");

    }else if(isset($_GET['ctl']) && $_GET['ctl'] == 'confirmarCompra'){
        $productosCesta = $cesta->getCesta();
        $unidades;
        $idProducto;
        
        if(isset($productosCesta)){
            
            foreach($productosCesta as $id => $cantidad){
                $productos[$id] = $cesta->visualizarProducto($id);
                
                $productos[$id]['cantidad'] = $cantidad;
                $unidades = $productos[$id]['cantidad'];
                
                $idProducto  = $productos[$id]['id'];
                
                $productos[$id]['totalProducto'] = $cantidad * $productos[$id]['precioProducto']; 
                
                $cesta->updateCantidadProducto($unidades,$idProducto);
            }
            unset($_SESSION['cesta']);
            generarPDF();
        }
    }

    function generarPDF(){
        global $productos;
        global $cesta;
        $preciosProductos = 0;

        ob_start();
        require('web/fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        
        //HEADER
        $pdf->SetAuthor("Thensi",true);
        $pdf->SetFont('Courier','B', 14);
        $pdf->Cell(120,10,'FACTURA', 0, 0, 'L');
        $pdf->SetFont('Courier','B', 10);
        $pdf->Cell(60,10,'Fecha: '.date('l jS F Y'), 0, 0,'C');
        $pdf->Ln();$pdf->Ln();

        //DATOS USER
        $pdf->Cell(60,5,'Datos del cliente:');
        $pdf->Ln();

        $pdf->SetFont('Courier','B', 10);
        $pdf->Cell(10,5, "");
        $pdf->Cell(60,5,'* Nombre: '.$_SESSION['datosUser'][0]);
        $pdf->Ln();
        $pdf->Cell(10,5, "");
        $pdf->Cell(60,5,"* Correo: ".$_SESSION['datosUser'][2]);
        $pdf->Ln();
        $pdf->Ln();

        //TABLA
        $pdf->SetFont('Courier','B', 12);
        $pdf->Cell(90,8,"Producto", 1, 0,'C');
        $pdf->Cell(30,8,"Cantidad", 1, 0,'C');
        $pdf->Cell(30,8,"Precio", 1, 0,'C');
        $pdf->Ln();
        $pdf->SetFont('Courier','B', 8);

        foreach($productos as $producto){
            $pdf->Cell(90,7,$producto['titulo'], 1, 0,'C');
            $pdf->Cell(30,7,$producto['cantidad'], 1, 0,'C');
            $pdf->Cell(30,7,$producto['totalProducto']." EUR", 1, 0,'C');
            $pdf->Ln();
            $preciosProductos += $producto['totalProducto'];
        }

        $pdf->Ln();
        $pdf->SetFont('Courier','B', 12);
        $pdf->Cell(60,8,"Total: ".$preciosProductos." EUR", 1, 0,'C');

        $pdf->Output();
        ob_end_flush();
    }

require_once('app/views/cesta/vista_cesta.php');






