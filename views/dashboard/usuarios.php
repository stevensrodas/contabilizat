<?php include_once __DIR__ . '/header-dashboard.php' ?>

<div class="contenedor-sm">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($usuarios)) {
            ?>
                <th class="noDatos" colspan="3">No hay datos</th>
            <?php
            } else {
            ?>
                <?php foreach ($usuarios as $usuario) {
                ?>
                    <tr data-id="<?php echo $usuario->id; ?>">
                        <td><?php echo $usuario->nombre; ?></td>
                        <td><?php echo $usuario->email; ?></td>
                        <td class="centrar"><button class="editar" data-id="<?php echo $usuario->id ?>"><ion-icon name="trash-outline"></ion-icon></button></td>
                    </tr>
                <?php
                } ?>
            <?php
            } ?>
        </tbody>
    </table>

    <section class="paginacion">
        <ul>
            <?php for ($i = 1; $i <= $totalPaginas; $i++) {
            ?>
                <li class="pages"><a href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
            <?php
            } ?>
        </ul>
    </section>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php' ?>