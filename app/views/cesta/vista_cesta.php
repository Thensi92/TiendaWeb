<section>
<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col">Titulo</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  
  <tbody>

    <?php
    foreach($productos as $producto){
    ?>
      <tr>
        <th scope="row"><img id="imagenCesta" src="<?=$producto['rutaImagen']?>" alt="..."></th>
        <td><?=$producto['titulo']?></td>
        <td><?=$producto['cantidad']?></td>
        <td><?=$producto['precioProducto']?> €</td>
        <td><?=$producto['total']?> €</td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</div>
</section>


