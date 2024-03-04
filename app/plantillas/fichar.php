<?php ob_start() ?>
<p>Empleado : <?=  $_SESSION['usuario']['Nombre']. ' ' . $_SESSION['usuario']['Apellido']   ?></p>
<p>Departamento : <?=  $_SESSION['usuario']['Departamento']?></p>
<p>Estado en turno : <?=  $_SESSION['usuario']['Activo']==0 ? 'Desconectado' : 'En turno'?></p>

<form method="POST">
<?php if($_SESSION['usuario']['Activo']==0) :?>
<input type="submit" name="ficharEntrada" value="Fichar Entrada">
<?php else : ?>
    <input type="submit" name="ficharSalida" value="Fichar Salida">
<?php endif ;?>
</form>




 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>