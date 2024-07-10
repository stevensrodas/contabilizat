<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php' ?>
    <div class="principal">
        <div class="burbujas">
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
        </div>
        <?php include_once __DIR__ . '/../templates/barra.php' ?>

        <div class="contenido">
            <h2 class="nombre-pagina"><?php echo $titulo ?></h2>
            <h2 class="nombre-pagina"><?php echo $contenido ?></h2>