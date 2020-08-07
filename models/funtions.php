<?php
/**
 *
 * Implementacion de funciones a utilizar en todo el sistema
 *
 * @author Manuel Gabriel <ingmanuelgabriel@gmail.com|ingmanuelgabriel@hotmail.com>
 * @copyright Copyright (c) 2020, Manuel Gabriel | WELMASTER
 *
**/

class WelMaster
{
	
	public function isAlphanumeric($string):bool
	{
		if(empty($string)){
			return false;
		}else{
			if( !is_string($string) ){
				return false;
			}else{
				return true;
			}
		}
	}

	public function isIntN($int):bool
	{
		if( empty($int) ){ 
			return false; 
		}else{
			if( !is_numeric($int) || $int <= 0 ){ 
				return false;
			}else{
				return true;
			}
		}
	}

	function FormatoNumero($value){
		$value = number_format($value,"2",".",",");
		return $value;
	}

	function FormatoFecha($valor){
		$valor = date('d/m/Y', strtotime($valor));
		return $valor;
	}

	function FormatoFechaHora($valor){
	    $valor = date('d/m/Y - H:m:s', strtotime($valor));
	    return $valor;
	}

	function DiasVencido($inicio,$final){
		$dteStart = new DateTime($inicio);
		$dteEnd = new DateTime($final);
		$dteDiff  = $dteEnd->diff($dteStart);

		return $dteDiff->format('%R%a');
	}

	function DiferenciaDias($inicio,$final){
		$label = '';
		$dteStart = new DateTime($inicio);
		$dteEnd = new DateTime($final);
		$dteDiff  = $dteEnd->diff($dteStart);
		if ( $dteDiff->y > 0 ) {
			if ($dteDiff->y == 1) {
				$label .= $dteDiff->y.' año, ';
			}else{
				$label .= $dteDiff->y.' años, ';
			}
		}

		if ($dteDiff->m == 1) {
			$label .= $dteDiff->m.' mes, ';
		}else{
			$label .= $dteDiff->m.' meses, ';
		}

		if ($dteDiff->d == 1) {
			$label .= $dteDiff->d.' dia';
		}else{
			$label .= $dteDiff->d.' dias';
		}

		return $label;
	}

	/* #################################################	Formato de texto 	################################# */
	function lowerCase($value)//Texto en minusculas (hola mundo)
	{
		return mb_strtolower($value);
	}

	function upperCase($value)//Texto en mayuscula (HOLA MUNDO)
	{
		return strtoupper($value);
	}

	function camelCase($value)//Primera letra de cada palabra en mayuscula (Hola Mundo)
	{
		return ucwords(mb_strtolower($value), "./- \t\r\n\f\v");
	}

	function sentenceCase($value)//Primera letra en mayuscula (Hola mundo)
	{
		return ucfirst(mb_strtolower($value));
	}
	/* #################################################	Formato de texto 	################################# */

	public function encrypt_decrypt($action, $string):?string
	{
	    $output = NULL;
	    $prepare = '';
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'TWpLnUvgpuB4wpLmw';
	    $secret_iv = '1UoXq4iPhV3oNY9HU';
	    // hash
	    $key = hash('sha256', $secret_key);
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    if ( $action == 'encrypt' ) {
	        $prepare = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($prepare);
	    } else if( $action == 'decrypt' ) {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    return $output;
	}
	public function encrypt($string) {
	    return $this->encrypt_decrypt('encrypt',$string);
	}
	public function decrypt($string) {
	    return $this->encrypt_decrypt('decrypt',$string);
	}
	
}
?>