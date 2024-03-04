
<?php ob_start() ?>

    <h2>INICIO - VISTA GENERAL DE LOS EMPLEADOS</h2>
    <table>
        <thead>
            <th>ID_EMPLEADO</th>
            <th>APELLIDO</th>
            <th>NOMBRE</th>
            <th>DEPARTAMENTO</th>
            <th>ESTADO</th>
        </thead>
        <tbody>
            <?php foreach ($listaEmpleados as $codigo => $detalles) : ?>
                <tr>
                    <td><?= $detalles['ID'] ?></td>
                    <td><?=$detalles['Apellido'] ?></td>
                    <td><?=$detalles['Nombre'] ?></td>
                    <td><?= $detalles['Departamento']?></td>
                    <td><?= $detalles['Activo']==0? 'Desconectado':'Trabajando'?></td>
                </tr>

            <?php endforeach ;?>

        </tbody>
    </table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
