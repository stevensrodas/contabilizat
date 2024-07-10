<aside class="sidebar">
    <h2>ContabilizaT</h2>

    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Dashboard') ? 'activo' : '' ?>" href="/dashboard">Inicio</a>
        <!-- <a class="<?php echo ($titulo === 'Inventario') ? 'activo' : '' ?>" href="/inventario">Inventario</a> -->
        <!-- <a class="<?php echo ($titulo === 'Crear Producto') ? 'activo' : '' ?>" href="/crear-producto">Crear Producto</a>
        <a class="<?php echo ($titulo === '') ? 'activo' : '' ?>" href="/">Medidas</a>
        <a class="<?php echo ($titulo === '') ? 'activo' : '' ?>" href="/">Categorias</a> -->
        <?php if ($_SESSION['rol'] == 1) {
        ?>
            <a class="<?php echo ($titulo === 'Crea Administrador del Instituto') ? 'activo' : '' ?>" href="/crear-instituto">Instituto</a>
            <a class="<?php echo ($titulo === 'Usuarios') ? 'activo' : '' ?>" href="/crear-usuarios">Usuarios</a>
        <?php
        } ?>
        <?php if ($_SESSION['rol'] == 2) {
        ?>
            <a class="<?php echo ($titulo === 'Usuarios') ? 'activo' : '' ?>" href="/crear-usuarios">Usuarios</a>
        <?php
        } ?>
        <a class="<?php echo ($titulo === 'NIC') ? 'activo' : '' ?>" href="/NIC">cuentas T NIC</a>
        <a class="<?php echo ($titulo === 'NIF') ? 'activo' : '' ?>" href="/NIF">cuentas T NIIF</a>
        <a class="<?php echo ($titulo === 'Perfil') ? 'activo' : '' ?>" href="/perfil">Perfil</a>
    </nav>
</aside>