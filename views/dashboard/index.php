<?php include_once __DIR__ . '/header-dashboard.php' ?>

<?php if (count($instituto) === 0) {
?>
    <p class="no-institutos">No tienes informacion de institutos Aun. <a href="/crear-instituto">Crea uno</a></p>
<?php } else { ?>
    <?php if ($_SESSION['rol'] == 1) {
    ?>
        <ul class="listado-instituto">
            <?php foreach ($instituto as $instituto) {
            ?>
                <li class="instituto">
                    <a href="/instituto?nombre=<?php echo $instituto->nombre ?>">
                        <?php echo $instituto->nombre; ?>
                    </a>
                </li>
            <?php
            } ?>
        </ul>
    <?php
    } else {
    ?>
        <p class="no-institutos">No tienes informacion para mostrar.</p>
    <?php
    } ?>
<?php } ?>

<?php include_once __DIR__ . '/footer-dashboard.php' ?>

