<?php include_once __DIR__ . '/header-dashboard.php' ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php' ?>

    <a href="/cambiar-password" class="enlace">Cambiar password</a>

    <form method="POST" class="formulario" action="/perfil">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input value="<?php echo $usuario->nombre ?>" type="text" name="nombre" id="nombre" placeholder="Tu nombre">
        </div>
        <div class="campo">
            <label for="nombre">Email</label>
            <input value="<?php echo $usuario->email ?>" type="email" name="email" id="email" placeholder="Tu Email">
        </div>
        <input type="submit" value="Guarda Cambios">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php' ?>