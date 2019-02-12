<section>
    <div id="datosUsuario">
        <form action="index.php?ctl=edit" method="POST">
            <fieldset id="formulario">
                <legend>PERFIL</legend>
                <label for="FirstName">Nombre:</label>
                <input type="text" name="nombre" id="FirstName" value="<?=$_SESSION['datosUser'][0]?>">
                
                <label for="nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha" id="nacimiento" value="<?=$_SESSION['datosUser'][1]?>">

                <label for="correo">Email:</label>
                <input type="email" name="email" id="correo" value="<?=$_SESSION['datosUser'][2]?>" readonly="readonly">

                <label for="apodo">Apodo:</label>
                <input type="text" name="alias" id="apodo" value="<?=$_SESSION['datosUser'][3]?>">

                <label for="pass">Contraseña:</label>
                <input type="password" name="contrasena" id="pass" value="<?=$_SESSION['datosUser'][4]?>">
                    
                <input type="submit" name="procesar_edicion" value="Editar Datos">
            </fieldset>
        </form>
    </div>
</section>