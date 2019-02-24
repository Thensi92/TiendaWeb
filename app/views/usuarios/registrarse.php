<section>    
    <form action="index.php?ctl=null" method="POST">
        <fieldset id="formulario">
            <legend>REGISTRO</legend>
            <label for="FirstName">Nombre:</label>
            <input type="text" name="nombre" id="FirstName" placeholder="Introducir nombre" required>
                
            <label for="nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha" id="nacimiento" required>

            <label for="CorreoE">Email:</label>
            <input type="email" name="correo" id="CorreoE" placeholder="example@example.com" required>

            <label for="apodo">Apodo:</label>
            <input type="text" name="alias" id="apodo" placeholder="Alias" required>

            <label for="pass">Contraseña:</label>
            <input type="password" name="contrasena" id="pass" placeholder="****" required>

            <input type="submit" name="procesar_registro" value="Registrarme">
        </fieldset>
    </form>
</section>