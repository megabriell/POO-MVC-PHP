<a href="../home/" class="logo">
<span class="logo-mini">
<img src="../misc/img/sistema/<?php echo $infoCompany['imgSegundaria'] ?>" alt="logo" 
title="<?php echo $infoCompany['Empresa']?>" width="45px">
</span>
<span class="logo-lg">
<img src="../misc/img/sistema/<?php echo $infoCompany['imgPrincipal']?>" alt="logo" 
title="<?php echo $infoCompany['Empresa']?>" width="180px">
</span>
</a>


<!-- Encabezado Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Botón de desplazamiento de la barra lateral-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>

	<!-- Menú derecho de la barra de navegación -->
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">

			<li class="dropdown messages-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- Botón de cambio de menú -->
					<i class="fa fa-envelope-o"></i> <span class="label label-success"> 8 </span>
				</a>
				<ul class="dropdown-menu">
					<li class="header"> Tú tienes 8 mensajes </li>
					<li><!-- Menú interior: contiene los mensajes -->
						<ul class="menu">
							<li><!-- Inician mensaje -->
								<a href="#">
									<div class="pull-left">
										<img src="../misc/img/usuario/default-avatar.png" class="img-circle" alt="User Image"><!-- Imagen de usuario -->
									</div>
									<h4><!-- Título del mensaje y marca de tiempo -->
										Equipo de apoyo <small><i class="fa fa-clock-o"></i> 5 mins </small>
									</h4>
									<p>¿Por qué no comprar un nuevo tema impresionante?</p><!-- El mensaje -->
								</a>
							</li>
						</ul><!-- Final del mensaje -->
					</li><!-- /.Menú -->
					<li class="footer"><a href="#">Leer todos los mensajes</a></li>
				</ul><!-- /.dropdown-menu -->
			</li><!-- /.messages-menu -->



			<?php
			$_Total = 10;//$_Total =  $db->get_var("SELECT COUNT(Estado) FROM pv_notificacion WHERE Id_Destino = '$codigo_empleado' AND Estado = 3 "); 
			?>
			<!-- Menu de notificaciones -->
			<li class="dropdown notifications-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="box_notify" ><!-- Botón de cambio de menú -->
					<i class="fa fa-bell-o"></i>
					<?php 
						if ($_Total) {
							echo "<span class='label label-warning' id='label_notify_number'> $_Total </span>";
						}
					?>
				</a>
				<ul class="dropdown-menu">
					<li class="header" id="label_notify_contents"> Notificaciones
						<div class="box-tools pull-right"> <a id="all_view">Marcar como leidos</a> </div>
					</li>
					<li> <ul class="menu" id="label_notify_body" data-maxtop="202"></ul> </li>
					<li class="footer"><a href="#">Ver todas</a></li>
				</ul>
			</li>



			<!-- Menú de tareas -->
			<li class="dropdown tasks-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- Botón de cambio de menú -->
					<i class="fa fa-flag-o"></i> <span class="label label-danger"> 9 </span>
				</a>
				<ul class="dropdown-menu">
					<li class="header"> Tienes 9 tareas </li>
					<li>
						<ul class="menu"><!-- Menú interior: contiene las tareas -->
							<li><!-- Elementos de tarea -->
								<a href="#"><!-- Título de la tarea y texto del progreso -->
									<h3> Diseña algunos botones <small class="pull-right"> 20% </small> </h3>                      
									<div class="progress xs"><!-- La barra de progreso -->
										<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only"><!-- Cambiar el atributo de ancho css para simular el progreso-->
												20% Complete
											</span>
										</div>
									</div>
								</a>
							</li><!-- Finaliza Elementos de tarea -->
						</ul>
					</li>
					<li class="footer"> <a href="#">Ver todas las tareas </a> </li>
				</ul>
			</li>



			<!-- Menú de la cuenta de usuario -->
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- Botón de cambio de menú -->
					<img src="../misc/img/usuario/<?php echo $infoUser['imgPerfil']?>" class="user-image" alt="User Image"><!-- La imagen del usuario en la barra de navegación -->
					<!-- Hidden-xs oculta el nombre de usuario en dispositivos pequeños para que solo aparezca la imagen. -->
					<span class="hidden-xs"> <?php echo $infoUser['Nombre']?> </span>
				</a>

				<ul class="dropdown-menu">
					<li class="user-header bg-red" style="background: url('../misc/img/portada/<?php echo $infoUser['imgPortada']?>') center center; background-size: cover;"><!-- La imagen del usuario en el menú -->
						<img src="../misc/img/usuario/<?php echo $infoUser['imgPerfil']?>" class="img-circle" alt="User Image"/>
						<p><strong>
							<?php echo $infoUser['Nombre'].'<br>'.$infoUser['Cargo'].' '.$infoUser['CorreoA'];?><br>
							<small>
							Mi codigo de empleado: <?php echo $_session['idEmployee'];?>
							</small>
						</strong></p>
					</li>
					<!-- Menu de pie de pagina-->
					<li class="user-footer">
						<div class="pull-left">
							<a href="../profile/perfil" class="btn bg-navy btn-default btn-flat"> Perfil </a>
						</div>
						<div class="pull-right">
							<a href="./controllers/login_controller?logout" class="btn bg-navy btn-default btn-flat"> Cerrar Sesion </a>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>