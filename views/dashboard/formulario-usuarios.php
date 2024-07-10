<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="nombre" id="nombre" placeholder="Nombre" name="nombre" />
</div>
<div class="campo">
    <label for="email">Email</label>
    <input type="email" id="email" placeholder="El Email" name="email" >
</div>
<div class="campo">
    <label for="password">Clave</label>
    <input type="password" id="password" placeholder="Tu Clave" name="password" />
</div>
<div class="campo">
    <label for="password">Repetir la Clave</label>
    <input type="password" id="password2" placeholder="Repite tu Clave" name="password2" />
</div>
<div class="campo">
    <input id="rol" name="rol" type="hidden" value="3" />
    <input id="usuario_instituto" name="usuario_instituto" type="hidden" value="<?php echo $_SESSION['id'] ?>" />
</div>