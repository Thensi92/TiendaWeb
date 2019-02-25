<section>

  <?php
  if(!empty($productos)){
  ?>
  <div class="table-responsive-md caja" >
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Titulo</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    
    <tbody>

      <?php
      foreach($productos as $producto){
      ?>
        <tr>
          <td><?=$producto['titulo']?></td>
          <td><?=$producto['cantidad']?></td>
          <td class="totalProducto"><?=$producto['totalProducto']?> €</td>
          <td class="menuOptions">
            <a href="index.php?ctl=eliminarProductoCesta&id=<?=$producto['id']?>"><img class="icono" src="web/icons/minun.ico"></a>
            <a href="index.php?ctl=añadirAlCarro&id=<?=$producto['id']?>"><img class="icono" src="web/img/plus.jpg"></a>
            <a href="index.php?ctl=eliminarFilaProductoCesta&id=<?=$producto['id']?>"><img class="icono" src="web/img/delete.png"></a>
            <a href="index.php?ctl=verProducto&id=<?=$producto['id']?>"><img class="icono" src="web/img/producto.png">
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>

    <tbody>
      <tr>
        <th class="fondoCelda posicionCeldaDer" colspan="2" scope="row">TOTAL:</th>
        <td class="fondoCelda posicionCeldaIzq" colspan="3" id="total"></td>
      </tr>
    </tbody>
  </table>
  </div>

  <script src="web/js/totalFactura.js"></script>
  <?php
  }else{
    require_once("app/views/cesta/cestaVacia.php");
  }
  
  if(!empty($productos)){
    echo '<div id="botonConfirmacion">';
      echo '<a href="index.php?ctl=confirmarCompra"><button class= "btn btn-dark">Confirmar Compra</button></a>';
    echo '</div>';
  }
  ?>
</section>


