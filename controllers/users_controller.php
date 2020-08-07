<?php
	include_once dirname(__file__,2).'/models/users.php';
	$users = new Users();
	$contentMessage = '';
	$timeMessage = '';
	$typeMessage = '';//type of menssage: red|green|orange|blue|purple|dark
	header("content-type: application/javascript");//tipo de respuesta devuelta: javascript

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($users->newUser($_POST)){
			$contentMessage = 'El usuario se ha creado correctamente';
			$typeMessage = $users->type;
			echo $_POST['modal'].".modal('hide');";//oculta el modal 
		}else{
			if (!empty($users->message)) {
				$contentMessage = $users->message;
				$typeMessage = $users->type;
			}else{
				$contentMessage = '<strong>Error [1005]</strong>: se produjo un error al procesar los datos. Intentelo de nuevo.';
				$typeMessage = 'red';
			}
		}
		$timeMessage = ($users->time)? "autoClose: 'Ok|10000'," : '';
	}

	//Request: editar usuario
	if(isset($_POST['edit']))
	{
		if($users->editUser($_POST)){
			$contentMessage = 'El usuario se ha modificado correctamente';
			if (!empty($users->message)) $contentMessage = $users->message;
			$typeMessage = $users->type;
			echo $_POST['modal'].".modal('hide');";//oculta el modal $('id').modal('hide')
		}else{
			if (!empty($users->message)) {
				$contentMessage = $users->message;
				$typeMessage = $users->type;
			}else{
				$contentMessage = '<strong>Error [1005]</strong>: se produjo un error al procesar los datos. Intentelo de nuevo.';
				$typeMessage = 'red';
			}
		}
		$timeMessage = ($users->time)? "autoClose: 'Ok|10000'," : '';
	}

	//Request: eliminar usuario
	if(isset($_POST['delete']))
	{
		header("content-type: application/javascript");
		if($users->deleteUser($_POST['id'])){
			$contentMessage = 'El usuario se ha eliminado correctamente';
			$typeMessage = $users->type;
		}else{
			if (!empty($users->message)) {
				$contentMessage = $users->message;
				$typeMessage = $users->type;
			}else{
				$contentMessage = '<strong>Error [1005]</strong>: se produjo un error al procesar los datos. Intentelo de nuevo.';
				$typeMessage = 'red';
			}
		}
		$timeMessage = ($users->time)? "autoClose: 'Ok|10000'," : '';
	}

	echo "$.alert({
		title: false,
		content: '".$contentMessage."',
		".$timeMessage."
		type: '".$typeMessage."',
		typeAnimated: true,
		buttons: {
			Ok: function () {}
			}
	});";

?>