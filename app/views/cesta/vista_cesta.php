<section>
<div class="table-responsive-md">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col">Titulo</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
      <th scope="col"></th>
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
        <td><?=$producto['precioProducto']?> €</td>
        <td><?=$producto['total']?> €</td>
        <td>
          <a href="index.php?ctl=eliminarProductoCesta&id=<?=$producto['id']?>&unidad=<?=$producto['cantidad']?>"><img class="icono" src="web/icons/minun.ico"></a>
          <a href="index.php?ctl=añadirAlCarro&id=<?=$producto['id']?>&unidad=<?=$producto['cantidad']?>"><img class="icono" src="web/img/plus.jpg"></a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</div>
</section>


