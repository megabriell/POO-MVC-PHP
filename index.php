<?php
	include_once './config/Conexion.php';
	$db = new Conexion();
	$_session = $db->session();
	if(  !$_session )echo '<script type="text/javascript">window.location.href = "./views/login/login";</script>';
	
	$infoUser = json_decode( $db->decrypt($_COOKIE["dataUser"]) ,true);
	$infoCompany = json_decode( $db->decrypt($_COOKIE["dataCompany"]) ,true);
	$db = NULL;
	
	include 'views/template/header.php';

	echo '<div id="contentBody">';
		include 'views/home/home.php';
	echo '</div>';
		
	include 'views/template/footer.php';
	?>
