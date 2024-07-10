<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php include_once __DIR__ . '/header-dashboard.php' ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/crear-usuarios" method="post" class="formulario">

        <?php include_once __DIR__ . '/formulario-usuarios.php' ?>
        <input type="submit" class="boton" value="Crear Usuario">
    </form>
</div>
<div class="contenedor-lg">
    <?php include_once __DIR__ . '/usuarios.php' ?>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php' ?>

<?php

$script = '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="build/js/usuario.js"></script>
    <script src="build/js/app.js"></script>
'

?>