<?php
require_once __DIR__ . '/../../core/conexionBd.inc';

class GestionBdRepositorio
{

    public function getEmpleados()
    {
        $sql = 'SELECT * from Empleado';

        try {
            $con = ((new ConexionBd))->getConexion();
            $snt = $con->prepare($sql);
            $snt->execute();

            $arrayEmpleados = $snt->fetchAll(PDO::FETCH_ASSOC);

            $arrayFinalEmpleados = [];

            foreach ($arrayEmpleados as $indice => $detalles) {
                $arrayFinalEmpleados[$detalles['ID']] = ['ID' => $detalles['ID'], 'Apellido' => $detalles['Apellido'], 'Nombre' => $detalles['Nombre'], 'Departamento' => $detalles['Departamento'], 'Activo' => $detalles['Activo']];
            }

            return $arrayFinalEmpleados;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getEmpleadoByCorreo($correo)
    {
        $sql = 'SELECT ID, Nombre, Apellido, correo, contraseña, foto, Departamento, Activo FROM Empleado where correo = :correoIntroducido';

        try {
            $con = ((new ConexionBd))->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindParam(':correoIntroducido', $correo, PDO::PARAM_STR);
            $snt->execute();

            $datos = $snt->fetch(PDO::FETCH_ASSOC);
            // var_dump($datos);
            return $datos;
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            $con = null;
        }
    }

    public function fichar(string $idEmpleado, int $tipo)
    {
        if ($tipo == 1) {
            $sqlUpdateEmple = 'UPDATE Empleado SET Activo = 1 WHERE ID = :idEmple';
        } else {
            $sqlUpdateEmple = 'UPDATE Empleado SET Activo = 0 WHERE ID = :idEmple';
        }
        $sqlInsertFichaje = 'INSERT into RegistroFichaje  (IDEmpleado, Tipo) VALUES (:IdEmpleado, :tipo )';
        try {
            $con = (new ConexionBd())->getConexion();
            $con->beginTransaction();
            $snt = $con->prepare($sqlUpdateEmple);
            $snt->bindValue(':idEmple', $idEmpleado);
            if (!$snt->execute()) {
                $con->rollBack();
                exit();
            }

            $snt = $con->prepare($sqlInsertFichaje);
            $snt->bindParam(':IdEmpleado', $idEmpleado, PDO::PARAM_INT);
            $snt->bindValue(':tipo', $tipo == 1 ? 'Entrada' : 'Salida');

            if (!$snt->execute()) {
                $con->rollBack();
                exit();
            }
            $con->commit();
            $_SESSION['usuario']['Activo']==1 ? $_SESSION['usuario']['Activo']=0 : $_SESSION['usuario']['Activo']=1 ;
        } catch (PDOException $ex) {
            $con->rollBack(); // Es buena práctica hacer rollback también aquí en caso de excepción.
            throw $ex;
        }finally{
           if(isset($snt)){
            unset($snt);
        } 
        if(isset($con)){
            unset($con);
        } 
        }
    }
}
