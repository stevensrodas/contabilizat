<div class="contenedor crear">
    <?php include_once __DIR__ . '/../templates/nombre_sitio.php' ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en ContabilizaT</p>
        <h3 class="descripcion-pagina">Contacta a un administrador para crear tu cuenta</h3>
        <p class="descripcion-pagina">Contactanos al +57 3004947510 o al +57 3059270272</p>
        <!-- <?php include_once __DIR__ . '/../templates/alertas.php' ?>
        <form action="/crear" method="post" class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="nombre" id="nombre" placeholder="Tu Nombre" name="nombre" value="<?php echo $usuario->nombre ?>"/>
            </div>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tu Email" name="email" value="<?php echo $usuario->email ?>"/>
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Tu Password" name="password" />
            </div>
            <div class="campo">
                <label for="password">Repetir password</label>
                <input type="password" id="password2" placeholder="Repite tu password" name="password2" />
            </div>
            <div class="campo">
                <input id="rol" name="rol" type="hidden" value="2" />
            </div>

            <input type="submit" class="boton" value="Crear cuenta">
        </form> -->
        <div class="acciones">
            <a href="/">¿Ya tienes cuenta? Iniciar Sesión</a>
            <a href="/olvide">¿Olvidaste tu password?</a>
        </div>
    </div>
</div>