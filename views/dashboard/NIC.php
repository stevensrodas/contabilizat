<?php include_once __DIR__ . '/header-dashboard.php' ?>



<div class="sombra contenedor-table">
    <?php include_once __DIR__ . '/cuentatNIC.php' ?>
    <?php include_once __DIR__ . '/nic_cuenta.php' ?>
</div>


<?php include_once __DIR__ . '/footer-dashboard.php' ?>

<?php

$script = '

    <script src="build/js/desplegar.js"></script>
    <script src="build/js/arregloNIC.js"></script>
    <script src="build/js/cuentaTNIC.js"></script>
    
'

?>