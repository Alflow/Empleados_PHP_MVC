<?php
require_once __DIR__ . '/../Repositorio/GestionBDRepositorio.php';
require_once __DIR__ . '/../../app/utilidades/sanitiza.inc';


class LoginController
{

  public function login()
  {
    if(isset($_POST['ok'])){
        
        $errores=[];

        $inputsSaneados=[];
        foreach($_POST as $key=>$value){
            $inputsSaneados[$key]= sanea($value);
        }

        // echo '<pre>';
        // var_dump($inputsSaneados);
        // echo '</pre>';
        try{
            $credencialesUsuarioEnBD = (new GestionBdRepositorio())->getEmpleadoByCorreo($inputsSaneados['email']);
            // var_dump("CREDENCIALES DE LA BD");
            // var_dump($credencialesUsuarioEnBD);

            
            if(empty($inputsSaneados['email']) || empty($inputsSaneados['contrasena']) ){
                $errores['faltanCampos']= 'No pueden faltar campos para iniciar sesión';
            }else if(!$credencialesUsuarioEnBD){

                $errores['userNoExiste']= 'El usuario no existe en la BDD';
                echo 'USUARIO NO ENCONTRADO';
            }else{
                echo 'USUARIO ENCONTRADO';
                $datosCorrectos = password_verify($inputsSaneados['contrasena'], $credencialesUsuarioEnBD['contraseña']);
                
                if($datosCorrectos == false){
                    $errores['passIncorrecta']= 'La contraseña no es correcta';
                }else{
                    $_SESSION['usuario']= $credencialesUsuarioEnBD;
                    
                    header('location: index.php');
                }

            }

        }catch(PDOException $ex){
            throw $ex;
        }
    }
    
    require __DIR__ . '/../../app/plantillas/login.php';
  }

  public function logout(){
    $_SESSION['usuario']= '';
    unset($_SESSION['usuario']);
    session_destroy();
    
    header('Location: index.php');
    exit();
  }
}
