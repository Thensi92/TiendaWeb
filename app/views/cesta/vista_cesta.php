<section>

  <?php
  if(!empty($productos)){
  ?>
  <div class="table-responsive-md caja" >
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Titulo</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col"></th>
      </tr>
    </thead>
    
    <tbody>

      <?php
      foreach($productos as $producto){
      ?>
        <tr>
          <th scope="row"><a href="index.php?ctl=verProducto&id=<?=$producto['id']?>"><img id="imagenCesta" src="<?=$producto['rutaImagen']?>" alt="Ver Producto"></a></th>
          <td><?=$producto['titulo']?></td>
          <td><?=$producto['cantidad']?></td>
          <td class="totalProducto"><?=$producto['totalProducto']?> €</td>
          <td>
            <a href="index.php?ctl=eliminarProductoCesta&id=<?=$producto['id']?>&unidad=<?=$producto['cantidad']?>"><img class="icono" src="web/icons/minun.ico"></a>
            <a href="index.php?ctl=añadirAlCarro&id=<?=$producto['id']?>&unidad=<?=$producto['cantidad']?>"><img class="icono" src="web/img/plus.jpg"></a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>

    <tbody>
      <tr>
        <th scope="row">TOTAL:</th>
        <td id="total"></td>
        <td colspan="2">
            <a href="index.php?ctl=generarDocumentoPDF">
                <img class="icono" src="web/img/pdf.png">
            </a>
        </td>
      </tr>
    </tbody>
  </table>
  </div>

  <script src="web/js/totalFactura.js"></script>
  <?php
  }else{
    require_once("app/views/cesta/cestaVacia.php");
  }
  
  if(!empty($productos) && $productos[$id]['cantidad'] > 0){
    echo '<div id="botonConfirmacion">';
      echo '<a href="index.php?ctl=confirmarCompra"><button class= "btn btn-dark">Confirmar Compra</button></a>';
    echo '</div>';
  }
  ?>
</section>


