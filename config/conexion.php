<?php
/**
 * Archivo de conexion a la base de datos, haciendo uso de la libreria ezSQL_pdo - Author:Justin Vincent - http://justinvincent.com/ezsql
 * 
 *	
 * @author Manuel Gabriel <ingmanuelgabriel@gmail.com|ingmanuelgabriel@hotmail.com>
 * @copyright Copyright (c) 2020, Manuel Gabriel | WELMASTER
 *
 *
**/

include_once dirname(__file__,2).'/config/ezSQL/ez_sql_core.php';
include_once dirname(__file__,2).'/config/ezSQL/ez_sql_pdo.php';
include_once dirname(__file__,2).'/models/cache.php';
include_once dirname(__file__,2).'/models/funtions.php';
//include_once dirname(__file__,2).'/models/ssss.php';
//include_once dirname(__file__,2).'/models/dddd.php';



class Conexion extends ezSQL_pdo
{
	private $dsn = 'mysql:host=localhost;dbname=punto_venta';
	private $user = 'root';
	private $password = 'databaseacces';
	private $configdb = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');

	public $cache;
	public $wel;
	Public $device;
	Public $sync;
	public $messageDB;

	function __construct()
	{
		date_default_timezone_set('America/Guatemala');
		try {
			$this->hide_errors();
			$this->cache = new Cache();
			$this->wel = new WelMaster();

			if ( !empty($this->dsn) && !empty($this->user) && !empty($this->password) && !empty($this->configdb) ) {
				if( $this->connect($this->dsn, $this->user, $this->password, $this->configdb) ){
				}else{
					throw new Exception("Errro interno: se ha detectado un problema con las credenciales ingresadas");
				}
			}else{
				throw new Exception("Errro interno: Uno de los valore de conexion no es valido");
			}
			//$this->vardump($this->conexion->captured_errors);
			//$this->last_error;
		}catch (Exception $e){
			//trigger_error($this->last_error.' -- '.$e->getMessage(),E_USER_WARNING);
			$this->messageDB = $e->getMessage();
		}
	}

	public function session():?array//Return function array or null "?array" -- Function to validate session of user
	{
		session_start();
		$array = [];
		$array['idEmployee'] = (isset($_SESSION['Id_Empleado']))? $_SESSION['Id_Empleado'] : '';
		$array['idUser'] = (isset($_SESSION['Id_Usuario']))? $_SESSION['Id_Usuario'] : '';
		$array['idLogged'] = (isset($_SESSION['session']))? $_SESSION['session'] : '';
		if (empty( $array['idLogged'] ) || $array['idLogged'] != (2156463)){
			$array = NULL;
		}
		return $array;//getValue: echo $array['idEmployee']
	}

	public function encrypt($string) {
        return $this->wel->encrypt_decrypt('encrypt',$string);
    }
    public function decrypt($string) {
        return $this->wel->encrypt_decrypt('decrypt',$string);
    }

	public function infoUser($id):?array//Return function array or null "?array"
    {
        $array = [];
        if( $this->wel->isIntN($id) ){
	        $query0 = "SELECT
	            pv_empleado.Nombre,
	            pv_empleado.Apellido,
	            pv_empleado.Telefono,
	            pv_empleado.Correo AS CorreoPersonal,
	            pv_cargo.Descripcion,
	            pv_usuario.Usuario,
	            pv_usuario.Correo AS CorreAcceso,
	            pv_config_usuario.Img_Perfil,
	            pv_config_usuario.Img_Portada,
	            pv_config_usuario.Estado
	            FROM pv_empleado
	            INNER JOIN pv_cargo ON pv_empleado.Id_Cargo = pv_cargo.Id_Cargo
	            INNER JOIN pv_usuario ON pv_empleado.Id_Empleado = pv_usuario.Id_Empleado
	            INNER JOIN pv_config_usuario ON pv_usuario.Id_Usuario = pv_config_usuario.Id_Usuario
	            WHERE pv_empleado.Id_Empleado = '$id' ";
	        $row = $this->get_row($query0);
	        if ( $row ) {
		        $array['Nombre'] = $row->Nombre . ' ' . $row->Apellido;
		        $array['Telefono'] = $row->Telefono;
		        $array['CorreoP'] = $row->CorreoPersonal;
		        $array['CorreoA'] = $row->CorreAcceso;
		        $array['Cargo'] = $row->Descripcion;
		        $array['Usuario'] = $row->Usuario;
		        $array['imgPerfil'] = ( !empty($img_perfil) )? $row->Img_Perfil : 'default-avatar.png';
		        $array['imgPortada'] = $row->Img_Portada;
		        $array['statusChat'] = $row->Estado;

		        if ($row->Estado == 1) {
		            $array['labelChat'] ='En Linea';
		            $array['colorStatus'] = 'text-success';
		        }else{
		            $array['labelChat'] = 'Desconectado';
		            $array['colorStatus'] = 'text-muted';
		        }
		    }else{
		    	$array = NULL;
		    }
		}else{
			$array = NULL;
		}
        return $array;

	}

    public function infoCompany():?array//Return function array or null "?array"
    {
        $array = [];
        $query0 = "SELECT *  FROM pv_empresa WHERE pv_empresa.Activo = 1";
        $row = $this->get_row($query0);
        if ($row) {
	        $array['IdEmpresa'] = $row->Id_Empresa;
	        $array['imgPrincipal'] = $row->Logo;
	        $array['imgSegundaria'] = $row->Logo2;
	        $array['Empresa'] = $row->Nombre;
	        $array['Direccion'] = $row->Direccion;
	        $array['NIT'] = $row->NIT;
	        $array['TFactura'] = $row->Id_Numeracion;
	    }else{
	    	$array = NULL;
	    }
        return $array;
    }

}