<?php
/**
 * 
 * Clase para obtner informacion de usuario y agregar un nuevo usuario
 *  
 * @author Manuel Gabriel <ingmanuelgabriel@gmail.com|ingmanuelgabriel@hotmail.com>
 * @copyright Copyright (c) 2020, Manuel Gabriel | WELMASTER
 *
 *
**/

include_once dirname(__file__,2)."/config/Conexion.php";
class Users
{
	private $db;
	private $data;//array of form post
	public $message;//message of result
	public $type;//type of menssage: red|green|orange|blue|purple|dark
	public $time;//set stopwatch

	function __construct()
	{
		$this->db   = new Conexion();
		$this->message = '';
		$this->type = 'green';
		$this->time = true;
		$this->data = array();
	}

	public function encrypt($string) {
	    return $this->db->wel->encrypt_decrypt('encrypt',$string);
	}
	public function decrypt($string) {
	    return $this->db->wel->encrypt_decrypt('decrypt',$string);
	}

	//Trae todos los usuarios registrados
	public function getUsers():?array
	{
		$rows = $this->db->get_results("SELECT T0.Id_Empleado, T0.Nombre, T0.Apellido, T0.Telefono, T0.Correo AS CorreoP, T0.Id_Cargo,
			T1.Id_Usuario, T1.Usuario, T1.Correo AS CorreoU
			FROM pv_empleado T0 INNER JOIN pv_usuario T1 ON (T0.Id_Empleado = T1.Id_Empleado) ");
		if ( !$rows ) return NULL;
		return $rows;
	}

	//Obtiene el usuario por IdUsuario
	public function getUserById($id):?array
	{
		if( $this->db->wel->isIntN($id) ){
			$row = $this->db->get_row("SELECT T1.Id_Empleado, T1.Nombre, T1.Apellido, T1.Telefono, T1.Correo AS CorreoP, T1.Id_Cargo,
			T0.Id_Usuario, T0.Usuario, T0.Correo AS CorreoU
			FROM pv_usuario T0 INNER JOIN pv_empleado T1 ON (T0.Id_Empleado = T1.Id_Empleado)
				WHERE T0.Id_Usuario = '$id' ");
			if (!$row) return NULL;
			return $row;
		}else{
			return NULL;
		}
	}

	//Obtiene el usuario por IdEmpleado
	public function getEmployeeById( $id ):?OBJECT
	{
		if( $this->db->wel->isIntN($id) ){
			$row = $this->db->get_row("SELECT T0.Id_Empleado, T0.Nombre, T0.Apellido, T0.Telefono, T0.Correo AS CorreoP, T0.Id_Cargo,
			T1.Id_Usuario, T1.Usuario, T1.Correo AS CorreoU
			FROM pv_empleado T0 
				INNER JOIN pv_usuario T1 ON (T0.Id_Empleado = T1.Id_Empleado) WHERE T0.Id_Empleado = '$id' ");
			if (!$row) return NULL;
			return $row;
		}else{
			return false;
		}
	}

	public function addPermission($array,$id,$del=false){
		if ($del) {
			$this->db->query("DELETE FROM pv_permiso WHERE Id_Usuario = '$id' ");
		}
		$values = "";
		foreach($array as $val) {
			$values .= "(NULL, '$val', '$id'),";
		}
		if ($values != "") {
			$values = trim($values, ',');
			$this->db->query("ALTER TABLE pv_permiso AUTO_INCREMENT = 1");
			$this->db->query("INSERT INTO pv_permiso (Id_Permiso, Id_Pagina, Id_Usuario) VALUES $values");
		}
	}

	//valida que el valor no existan en la base de datos
	public function isDuplicate($data=NULL):bool
	{
		if( !empty($data) ){
			$query0 = $this->db->get_row("SELECT T0.Correo, T1.Usuario, T1.Correo as CorreoU FROM 
			pv_empleado T0
			LEFT JOIN pv_usuario T1
			ON T0.Id_Empleado = T1.Id_Empleado
			WHERE T0.Correo = '$data' OR T1.Usuario = '$data' OR T1.Correo = '$data'" );
			if ( $query0 ) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function validData($post,$id=null):bool
	{
		$aux = $this->db->wel;

		if( !empty($id) ){
			$id = $this->decrypt( $id );//Decrypt ID
			$post['id1'] = $this->decrypt( $post['id1'] );//Decrypt ID
			$this->data['Id'] = ( $aux->isIntN($id) )? $this->db->escape($id) : '' ;
			$this->data['IdUser'] = ( $aux->isIntN($post['id1']) )? $this->db->escape($post['id1']) : '' ;
		}
		if (!isset($post['rememberPass']) || !$post['rememberPass']) {//si el campo no esta definido o checked realiza la validación
			$this->data['pass'] = ( !empty($post['pass']) && $post['pass'] === $post['confirPass'] )? password_hash($this->db->escape($post['pass']), PASSWORD_DEFAULT) : '';
		}
		$this->data['name'] = ( !empty($post['name']) )? $aux->camelCase( $this->db->escape($post['name']) ) : '' ;
		$this->data['lastName'] = ( !empty($post['lname']) )? $aux->camelCase( $this->db->escape($post['lname']) ) : '';
		$this->data['position'] = ( !empty($post['position']) && $aux->isIntN($post['position']) )? $this->db->escape($post['position']) : '';
		$this->data['phone'] = ( !empty($post['phone']) )? $this->db->escape($post['phone']) : '';
		$this->data['emailP'] = ( !empty($post['emailP']) )? $aux->lowerCase($this->db->escape($post['emailP'])) : '';
		$this->data['user'] = ( !empty($post['user']) )? $aux->upperCase( $this->db->escape($post['user']) ) : '';
		$this->data['emailU'] = ( !empty($post['emailU']) )? $this->db->escape($post['emailU']) : '';
		$this->data['permission'] = ( !empty($post['permission']) )? $this->db->escape($post['permission']) : '';

		foreach ($this->data as $key => $value) {
			if (empty($value)) {
				return false;
				break;
			}
		}
		return true;
	}	

	//Crea un nuevo usuario
	public function newUser($dataForm):bool
	{
		$result = true;
		if( $this->validData($dataForm) ){//valida que ningun campo este vacio, aplica formato correspondiente a cada campo
			$insert = $this->data;
			if ( !$this->isDuplicate($insert['user']) && !$this->isDuplicate($insert['emailU']) ) { //Valida que el correo o usuario no exista(repetido)
				$query1 = "INSERT INTO pv_empleado
				(Id_Empleado, Nombre, Apellido, Telefono, Correo, Id_Cargo) 
				VALUES
				(NULL,'".$insert['name']."','".$insert['lastName']."','".$insert['phone']."','".$insert['emailP']."','".$insert['position']."')";	
				if ( $this->db->query($query1) ) {//guarda informacion de empleado
					$Last_Id = $this->db->insert_id;
					$query2 = "INSERT INTO pv_usuario
					(Id_Usuario, Id_Empleado, Usuario, Correo, Contrasena)
					VALUES
					(NULL, '$Last_Id', '".$insert['user']."', '".$insert['emailU']."', '".$insert['pass']."') ";	

					if ( $this->db->query($query2) ) {//guarda datos de acceso para empleado
						$Last_Id = $this->db->insert_id;
						$query3 = "INSERT INTO pv_config_usuario
						(Id_Config_Usuario, Id_Usuario, Img_Perfil, Img_Portada, Estado)
						VALUES
						(NULL, $Last_Id, '', '', 0) ";
						if ( $this->db->query($query3) ) {//guarda datos de configuracion de usuario
							$this->addPermission($insert['permission'],$Last_Id);
							//new infoDevice($codigo_empleado,"Ha otorgado acceso a $label");
							//new Sincronizacion($query,1,"",$codigo_Usuario);
						}else{
							$this->message = '<strong>Advertencia [1501]</strong>: Algunos datos complemetarios no fueron guaradados. Notifique el error.';
							$this->type = 'orange';
							$this->time = false;
							$result = false;
						}
					}else{
						$this->message = '<strong>Error [1004]</strong>: Los datos fueron guardados parciamente. Notifique el error.';
						$this->type = 'red';
						$this->time = false;
						$result = false;
					}
				}else{
					$this->message = '<strong>Error [1003]</strong>: Los datos no fueron guardados debido a un erro interno. Intentelo de nuevo.';
					$this->type = 'red';
					$result = false;
				}
			}else{
				$this->message = '<strong>Error [1002]</strong>: El usuario/correo ya existe, ingresa un valor distinto.';
				$this->type = 'red';
				$result = false;
			}
		}else{
			$this->message = '<strong>Error [1001]</strong>: Un campo del formulario esta vació o no cumple con el formato correcto. Revise los valores ingresados';
			$this->type = 'red';
			$result = false;
		}
		return $result;
	}
	
	private function setUpdate($array):bool
	{
		//T0.Id_Empleado, T0.Nombre, T0.Apellido, T0.Telefono, T0.Correo AS CorreoP, T0.Id_Cargo, T1.Id_Usuario, T1.Usuario, T1.Correo AS CorreoU
		//data['Id'], data['name'], data['lastName'], data['position'], data['phone'], data['phone'], data['emailP'], data['user'], data['emailU'], data['pass'], 
		$stored = $this->getEmployeeById($array['Id']);
		$set =  '';
		$duplicate =  '';

		if ($stored->Nombre != $array['name']) {
			$set .= "T0.Nombre = '".$array['name']."',";
		}
		if ($stored->Apellido != $array['lastName']) {
			$set .= "T0.Apellido = '".$array['lastName']."',";
		}
		if ($stored->Telefono != $array['phone']) {
			$set .= "T0.Telefono = '".$array['phone']."',";
		}
		if ($stored->CorreoP != $array['emailP']) {
			$set .= "T0.Correo = '".$array['emailP']."',";
		}
		if ($stored->Id_Cargo != $array['position']) {
			$set .= "T0.Id_Cargo = '".$array['position']."',";
		}
		if ($stored->Usuario != $array['user']) {
			if ( !$this->isDuplicate($array['user'])) {
				$set .= "T1.Usuario = '".$array['user']."',";
			}else{
				$duplicate .= "<br>Error [1002]:El usuario <strong>".$array['user']."</strong> ya existe, ingresa un valor distinto.";
			}
		}
		if ($stored->CorreoU != $array['emailU']) {
			if ( !$this->isDuplicate($array['emailU'])) {
				$set .= "T1.Correo = '".$array['emailU']."',";
			}else{
				$duplicate .= "<br>Error [1002]:El correo <strong>".$array['emailU']."</strong> ya existe, ingresa un valor distinto.";
			}
		}
		if ( isset($array['pass']) ) {
			$set .= "T1.Contrasena = '".$array['pass']."',";
		}
		$set = trim($set, ',');//Elimina el ultimo caracter definido ','
		$this->data = array();//reset array
		$this->data['set'] = $set;
		$this->data['duplicate'] = $duplicate;

		if ( empty($set) ) {
			return false;
		}else{
			return true;
		}
	}

	//Modifica el usuario
	public function editUser($dataForm):bool
	{
		if ( empty($dataForm['id0']) || empty($dataForm['id1']) ) {//valida que el campo Id tenga un valor
			$this->message = '<strong>Error [1006]</strong>: Los datos no fueron procesados correctamente. Notifique el error.';
			$this->type = 'red';
			$this->time = false;
			return false;
		}
		$result = true;
		if($this->validData($dataForm, $dataForm['id0'])){//valida que ningun campo este vacio, aplica formato correspondiente a cada campo
			$array = $this->data;
			$this->addPermission($array['permission'],$array['IdUser'],true);//actualiza los permisos de usuario
			if( $this->setUpdate($array) ){//verifica si hay cambios para aplicar
					$query0 = "UPDATE pv_empleado T0 
						INNER JOIN pv_usuario T1 ON (T0.Id_Empleado = T1.Id_Empleado)
						SET ".$this->data['set']."
						WHERE T0.Id_Empleado = '".$array['Id']."' ";
					if($this->db->query($query0)){
						//new Sincronizacion($query_Data,2,"",$codigo_Usuario);
						if ( !empty($this->data['duplicate']) ) {
							$this->message = "El usuario se ha modificado correctamente. Con algunas excepciones: "
								.$this->data['duplicate'];
							$this->time = false;
							$this->type = 'green';
							//Finaliza If retorna valor verdadero
						}
					}else{
						$this->message = '<strong>Error [1003]</strong>: Los datos no fueron guardados debido a un erro interno. Intentelo de nuevo.';
						$this->type = 'red';
						$result = false;
					}
			}else{
				if ( !empty($this->data['duplicate']) ) {//Valida que el correo o usuario no exista(repetido)
					$this->message = "No se ha aplicado ningun cambio: ".$this->data['duplicate'];
					$this->type = 'orange';
					$this->time = false;
					$result = false;
				}else{
					$this->message = 'No se ha detectado ningun cambio';
					$this->type = 'orange';
					$result = false;
				}
			}
		}else{
			$this->message = '<strong>Error [1001]</strong>: Un campo del formulario esta vació o no cumple con el formato correcto. Revise los valores ingresados';
			$this->type = 'red';
			$result = false;
		}
		return $result;
	}

	//Borra el usuario por id
	public function deleteUser( $id ):bool
	{
		$result = true;
		if ( $this->db->wel->isIntN($id) ) {
			$query0 = "DELETE FROM pv_empleado WHERE Id_Empleado = '$id' ";
			if( $this->db->query($query0) ){
				//new Sincronizacion($queryDelete3,1,"",$codigo_Usuario);
				$result = true;
			}else{
				$this->message = '<strong>Error [1003]</strong>: Los datos no fueron guardados debido a un erro interno. Intentelo de nuevo.';
				$this->type = 'red';
				$result = false;
			}
		}else{
			$this->message = '<strong>Error [1006]</strong>: Los datos no fueron procesados correctamente. Notifique el error.';
			$this->type = 'red';
			$this->time = false;
			$result = false;
		}
		return $result;
	}

}