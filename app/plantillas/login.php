<?php

 ?>

<?php ob_start() ?>

<form method="POST">
    <legend>Inicio de sesión</legend>
    <label>
        <input type="email" name="email" placeholder="Inserte su correo" value="<?= isset($inputsSaneados['email'])? $inputsSaneados['email'] : '' ?>">
    </label>
    <?= isset($errores['userNoExiste']) ? $errores['userNoExiste'].'<br>' : ''  ?>
    <label>
        <input type="password" name="contrasena" placeholder="Introduzca su contraseña  ">
    </label>
    <br>
    <?= isset($errores['faltanCampos']) ? $errores['faltanCampos'] : ''  ?>
    <input type="submit" name="ok" value="Acceder">
</form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
