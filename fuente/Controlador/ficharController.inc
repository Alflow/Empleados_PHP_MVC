<?php
require_once __DIR__ . '/../Repositorio/GestionBDRepositorio.php';
require_once __DIR__ . '/../../app/utilidades/sanitiza.inc';


class ficharController
{

  public function vistaFichaje()
  {
    if(isset($_POST['ficharEntrada'])){
      try{
        (new GestionBdRepositorio())->fichar($_SESSION['usuario']['ID'], 1);
      }catch(PDOException $ex){
          throw $ex;
      }
    }
    
    if(isset($_POST['ficharSalida'])){
        try{
            (new GestionBdRepositorio())->fichar($_SESSION['usuario']['ID'], 0);
          }catch(PDOException $ex){
              throw $ex;
          }
      }

    require __DIR__ . '/../../app/plantillas/fichar.php';
  }

  

  
}
