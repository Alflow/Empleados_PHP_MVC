<?php
require_once __DIR__ . '/../Repositorio/GestionBDRepositorio.php';


class DefaultController
{

  public function inicio()
  {
    $listaEmpleados = (new GestionBdRepositorio)->getEmpleados();
    // echo '<pre>';
    // var_dump($listaEmpleados);
    // echo '</pre>';
    
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }
}
