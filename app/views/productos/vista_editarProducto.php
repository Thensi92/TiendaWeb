<section>
    <div id="caja_busqueda">
        <form action="index.php?ctl=null" method="POST">
            <fieldset id="formulario_productos">
                <legend>EDITAR PRODUCTOS</legend>
                <label for="id_producto">ID:</label>
                <input type="text" name="id" id="id_producto" value="<?=$id?>" readonly="readonly">

                <label for="product">Titulo:</label>
                <input type="text" name="titulo" id="product" value="<?=$titulo?>">

                <label for="image">Imagen:</label>
                <input type="file" name="imagen" id="image" required>

                <label for="price">Precio:</label>
                <input type="number" name="precio" id="price" value="<?=$precio?>">

                <label for="quantity">Cantidad:</label>
                <input type="number" name="cantidad" id="quantity" value="<?=$cantidad?>">

                <label for="descript">Descripcion:</label>
                <textarea rows="3" cols="20" name="descripcion" id="descript"><?=$descripcion?></textarea>

                <input type="submit" name="procesar_editarProducto" value="Insertar Producto">
            </fieldset>
        </form>
    </div>
</section>