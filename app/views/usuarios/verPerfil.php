
    <section>
        <div id="datosUsuario">
        <table id="view_perfil">
        <tr>
            <td>Nombre del Usuario:</td><td><?=$_SESSION['datosUser'][0]?></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento:</td><td><?=$_SESSION['datosUser'][1]?></td>
        </tr>
        <tr>
            <td>Correo electronico:</td><td><?=$_SESSION['datosUser'][2]?></td>
        </tr>
        <tr>
            <td>Apodo:</td><td><?=$_SESSION['datosUser'][3]?></td>
        </tr>
    </table>
        <div id="botones_perfil">
            <form action="index.php" method="POST">
                <input type="submit"  value="Atras">
            </form>

            <form action="index.php?ctl=modificarDatos" method="POST">
                <input type="submit"  value="Editar">
            </form>
        </div>
        </div>
    </section>