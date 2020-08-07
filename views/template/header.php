<!DOCTYPE html>
<html>
<head>

	<title><?php echo $infoCompany['Empresa'] ?></title>

	<meta http-equiv="Content-Language" content="es"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" href="./misc/img/sistema/favicon.png" type="image/png">

	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css">
	<!-- Fuente Awesome -->
	<link rel="stylesheet" href="./plugins/bootstrap/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="./plugins/bootstrap/css/ionicons.min.css">
	<!-- AdminLTE -->
	<link rel="stylesheet" href="./template/css/AdminLTE.min.css">
	<link rel="stylesheet" href="./template/css/skins/skin-black-light.min.css">
	<link rel="stylesheet" href="./template/css/AdminLTE.welmaster.css">

</head>
<body class="sidebar-mini skin-black-light sidebar-collapse">
	<div class="wrapper">

		<header class="main-header">
			<?php include_once 'navbar.php'; ?>
		</header>

		<?php include_once 'menu.php'; ?>

		<div class="content-wrapper">
			<?php include_once 'EncaPagina.php'; ?>
			
			<section class="content">