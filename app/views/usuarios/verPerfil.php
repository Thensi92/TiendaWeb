<section id="datosUsuario">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apodo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row"><?=$_SESSION['datosUser'][0]?></th>
                <td><?=$_SESSION['datosUser'][3]?></td>
                <td><?=$_SESSION['datosUser'][1]?></td>
                <td><?=$_SESSION['datosUser'][2]?></td>
            </tr>

            <tr>
                <td colspan="4" id="botonPerfil">
                    <form action="index.php?ctl=modificarDatos" method="POST">
                        <input type="submit" value="Editar">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
<!--
-->
</section>


