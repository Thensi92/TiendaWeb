<?php
require "app/db/Pagination.php";

/* Config Connection */
$root = 'root';
$password = '';
$host = 'localhost';
$dbname = 'carrito_juegos';

$connection = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password);
$pagination = new PDO_Pagination($connection);
$search = null;

    if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "") {
        $search = htmlspecialchars($_REQUEST["search"]);
        $pagination->param = "&search=$search";

        $pagination->rowCount("SELECT * FROM productos WHERE titulo LIKE '%$search%' ");
        $pagination->config(5, 2);

        $sql = "SELECT * FROM productos WHERE titulo LIKE '%$search%' ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $connection->prepare($sql);

        $query->execute();
        $model = array();

        while($rows = $query->fetch()) {
            $model[] = $rows;
        }

    }else {
        $pagination->rowCount("SELECT * FROM productos");
        $pagination->config(5, 2);

        $sql = "SELECT * FROM productos ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";

        $query = $connection->prepare($sql);

        $query->execute();
        $model = array();
        
        while($rows = $query->fetch()) {
            $model[] = $rows;
        }
    }
?>

<section>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" id="caja_busqueda">
            <input type="text" name="search" value="<?php echo $search ?>">
            <input type="submit" value="Buscar">
        </form>
        
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