<section>
    <div id="caja_busqueda">
        <form action="index.php?ctl=null" method="POST">
            <fieldset id="formulario_productos">
                <legend>INGRESAR PRODUCTOS</legend>
                <label for="product">Titulo:</label>
                <input type="text" name="titulo" id="product">

                <label for="image">Imagen:</label>
                <input type="file" name="imagen" id="image">

                <label for="price">Precio:</label>
                <input type="number" name="precio" id="price">

                <label for="quantity">Cantidad:</label>
                <input type="number" name="cantidad" id="quantity">

                <label for="descript">Descripcion:</label>
                <textarea rows="3" cols="20" name="descripcion" id="descript"></textarea>

                <input type="submit" name="procesar_insertarProducto" value="Insertar Producto">
            </fieldset>
        </form>
    </div>
</section>