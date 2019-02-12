<section>
  <div class="card" style="width: 18rem;">

    <img src="<?=$datosDelProducto['rutaImagen']?>" class="card-img-top" alt="...">

    <div class="card-body">
      <h5 class="card-title"><?=$datosDelProducto['titulo']?></h5>
      <p class="card-text"><?=$datosDelProducto['descripcion']?></p>
    </div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item">Precio: <?=$datosDelProducto['precioProducto']?></li>

      <?php
      if(!empty($_SESSION['datosUser'])){
        if($_SESSION['datosUser'][5] == "admin"){
          echo '<li class="list-group-item">Cantidad: '.$datosDelProducto["precioProducto"].'</li>';
          echo '<li class="list-group-item">ID: '.$datosDelProducto["id"].'</li>';
          echo '</ul>';
       
          echo '<div class="card-body">';
            echo '<a href="#" class="card-link">Editar</a>';
            echo '<a href="#" class="card-link">Eliminar</a>';
          echo '</div>';
      }else{
        echo '</ul>';
        
        echo '<div class="card-body">';
          echo '<a href="#" class="card-link">Comprar</a>';
        echo '</div>';
      }
    }else{
      echo '</ul>';
        
      echo '<div class="card-body">';
        echo '<a href="index.php?ctl=login" class="card-link">Login</a>';
        echo '<a href="index.php?ctl=registrar" class="card-link">Registrate</a>';
      echo '</div>';
    }
    
    ?>


  </div>
</section>