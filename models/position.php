<?php
/**
 * 
 * Clase para obtener todos los cargo de la empresa asi como agregar un nuevo cargo
 *  
 * @author Manuel Gabriel <ingmanuelgabriel@gmail.com|ingmanuelgabriel@hotmail.com>
 * @copyright Copyright (c) 2020, Manuel Gabriel | WELMASTER
 *
 *
**/

include_once dirname(__file__,2)."/config/Conexion.php";
class Positions
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

	//Trae todos los cargos registrados
	public function getPositions():?array
	{
		$rows = $this->db->get_results("SELECT * FROM pv_cargo T0 ");
		if ( !$rows ) return NULL;
		return $rows;
	}

	//Obtiene el cargo por id
	public function getPositionById( $id ):?array
	{
		if( $this->db->wel->isIntN($id) ){
			$row = $this->db->get_row("SELECT * FROM pv_cargo T0 WHERE T0.Id_Cargo = '$id' ");
			if( !$row )return NULL;
			return $row;
		}else{
			return NULL;
		}
	}

	private function validData($post){
		$this->data['permission'] = ( !empty($post['permission']) )? $this->db->escape($post['permission']) : '';
		foreach ($this->data as $key => $value) {
			if (empty($value)) {
				return false;
				break;
			}
		}
		return true;
	}


	//Crea un nuevo cargo
	public function newUser($dataForm){
		return true;
	}

	//Modifica el cargo espesificado
	public function setEditUser($data){
		return false;
	}

	//Borra el cargo espesificado
	public function deleteUser( $id=NULL ){
		return false;
	}

}
