<?php
require_once('app/controllers/productos/busquedaProductos.php');
?>

<section>

    <div id="view_product">
            
    <?php
    foreach($model as $row) {
        
        echo '<div class="card" style="width: 18rem;">';
        echo '<img class="card-img-top" src='.$row["imagen"].'>';
        
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row["titulo"].'</h5>';
        echo '<a href="index.php?ctl=verProducto&&id='.$row["id"].'" class="btn btn-primary">Ver</a>';
        echo '</div>';
        
        echo '</div>';
    }
    
    ?>   
    </div>
    
    
    <?php
    echo "<center>";
        echo "<div>";
            $pagination->pages("btn btn-primary");
        echo "</div>";
    echo "</center>";
    ?>
    
</section>