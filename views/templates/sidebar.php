<aside class="sidebar">
    <h2>ContabilizaT</h2>

    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Dashboard') ? 'activo' : '' ?>" href="/dashboard">Inicio</a>
        <?php if ($_SESSION['rol'] == 1) {
        ?>
            <a class="instituto">Institutos<ion-icon class="icono_instituto" name="caret-down-outline"></ion-icon></a>
            <div class="institutos" style="display: none;">
                <ul>
                    <li><a class="<?php echo ($titulo === 'Crear Instituto') ? 'activo' : '' ?>" href="/crear-instituto">Crear almacen</a></li>
                    <li><a class="<?php echo ($titulo === 'Listado de Institutos') ? 'activo' : '' ?>" href="/instituto">Listado de Institutos</a></li>
                </ul>
            </div>
            <a class="usuario">Usuarios<ion-icon class="icono_usuario" name="caret-down-outline"></ion-icon></a>
            <div class="usuarios" style="display: none;">
                <ul>
                    <li><a class="<?php echo ($titulo === 'Crear Usuarios') ? 'activo' : '' ?>" href="/crear-usuarios">Crear Usuarios</a></li>
                    <li><a class="<?php echo ($titulo === 'Listado de Usuarios') ? 'activo' : '' ?>" href="/usuarios">Listado de Usuarios</a></li>
                </ul>
            </div>
        <?php
        } ?>
        <?php if ($_SESSION['rol'] == 2) {
        ?>
            <a class="usuario">Usuarios<ion-icon class="icono_usuario" name="caret-down-outline"></ion-icon></a>
            <div class="usuarios" style="display: none;">
                <ul>
                    <li><a class="<?php echo ($titulo === 'Crear Usuarios') ? 'activo' : '' ?>" href="/crear-usuarios">Crear Usuarios</a></li>
                    <li><a class="<?php echo ($titulo === 'Listado de Usuarios') ? 'activo' : '' ?>" href="/usuarios">Listado de Usuarios</a></li>
                </ul>
            </div>
        <?php
        } ?>
        <a class="<?php echo ($titulo === 'NIC') ? 'activo' : '' ?>" href="/NIC">cuentas T NIC</a>
        <a class="<?php echo ($titulo === 'NIF') ? 'activo' : '' ?>" href="/NIF">cuentas T NIIF</a>
        <a class="<?php echo ($titulo === 'Perfil') ? 'activo' : '' ?>" href="/perfil">Perfil</a>
    </nav>
</aside>

<?php

$script = '
    <script src="build/js/desplegar.js"></script>
'

?>