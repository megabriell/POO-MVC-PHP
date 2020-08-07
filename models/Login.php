<?php
/**
 * 
 * Clase que valida el acceso a usuario registrados
 *  
 * @author Manuel Gabriel <ingmanuelgabriel@gmail.com|ingmanuelgabriel@hotmail.com>
 * @copyright Copyright (c) 2020, Manuel Gabriel | WELMASTER
 *
 *
**/

include_once dirname(__file__,2)."/config/Conexion.php";
class Login {
    private $db;
    private $data;//array of form post
    public $message;//message of result
    public $type;//type of menssage: red|green|orange|blue|purple|dark
    public $time;//set stopwatch

    public function __construct(){
        $this->db = new Conexion();
        $this->message = '';
        $this->type = 'green';
        $this->time = true;
        $this->data = array();
    }

    public function doLogout(){
        session_start();        
        $_SESSION = array();// Destruir todas las variables de sesión.
        session_destroy();
        setcookie("dataUser", "", time() - 10);
        setcookie("dataCompany", "", time() - 10);
        header("location:../views/login/login");
    }
    
    public function validData($post):bool
    {
        $this->data['correo'] = ( !empty($post['correo']) )? $this->db->escape($post['correo']) : '' ;
        $this->data['contrasena'] = ( !empty($post['contrasena']) )? $this->db->escape($post['contrasena']) : '';
        foreach ($this->data as $key => $value) {
            if ( empty($value) ) {
                $this->message = '<strong>Error [1001]</strong>: Un campo del formulario esta vació o no cumple con el formato correcto. Revise los valores ingresados';
                $this->type = 'red';
                break;
                return false;
            }
        }
        if( $this->Login($this->data) ) return true;
    }   

    private function Login($data):bool
    {
        try{
            $query0 = "SELECT Id_Empleado, Id_Usuario, Contrasena
                FROM pv_usuario
                WHERE Usuario = '".$this->data['correo']."' OR Correo = '".$this->data['correo']."' ";
            $user = $this->db->get_row($query0);
            if( $user ){
                if ( password_verify($this->data['contrasena'], $user->Contrasena) ) {
                    session_start();
                    $_SESSION['Id_Empleado'] = $user->Id_Empleado;
                    $_SESSION['Id_Usuario'] = $user->Id_Usuario;
                    $_SESSION['session'] = (2156463);

                    $inUser = $this->db->infoUser($user->Id_Empleado);
                        setcookie("dataUser", $this->db->encrypt( json_encode($inUser) ),'', "/");//Create-Cookie
                    $inCompany = $this->db->infoCompany();
                        setcookie("dataCompany", $this->db->encrypt( json_encode($inCompany) ),'', "/");//Create-Cookie

                    //new infoDevice($_SESSION['Id_Empleado'],'Inicio de Sesion');
                    return true;
                } else {
                    throw new Exception("La contraseña no coinciden.");
                    return false;
                }
            } else {
                throw new Exception("Usuario o correo no coinciden.");
                return false;
            }
        }catch(Exception $e){
            $this->message = $e->getMessage();
        }
    }
}
?>
