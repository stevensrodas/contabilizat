<?php include_once __DIR__ . '/header-dashboard.php' ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/crear-instituto" method="post" class="formulario">

        <?php include_once __DIR__ . '/formulario-instituto.php' ?>
        <input type="submit" class="boton" value="Crear instituto">
    </form>
</div>


<?php include_once __DIR__ . '/footer-dashboard.php' ?>