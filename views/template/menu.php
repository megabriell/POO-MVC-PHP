<aside class="main-sidebar ">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="./misc/img/usuario/<?php echo $infoUser['imgPerfil']?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info" style="width: 100%">
				<p>
					<?php echo $infoUser['Nombre'] ?>
				</p>
				<!--<a href="#">  Estado
					<i class="fa fa-circle <?php echo $Color_Estado;?>"></i>
					<?php echo $estado_Chat;?> 
				</a> -->
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="header">
				MENU DE NAVEGACION
			</li>
			<li class="treeview"> <!-- <li class="treeview active">-->
				<a href="home" id="home" class="menuItem">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>
			<?php
				include_once './models/menu.php';
				$menu = new Menu();
				$arrayMenu = $menu->readMenu();
				$menu = $arrayMenu[0];//get data of cache
				$SubMenu = $arrayMenu[1];//get data of cache
				
				foreach ($menu as $key => $value) {
					echo '<li class="treeview">
							<a href="">
								<i class="fa '.$value['icon'].'"></i><span>'.$key.'</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">';

					unset($value["icon"]);//elimina elemento de arreglo
					foreach ($value as $subKey => $subVal) {
						if($SubMenu){
							$page = $SubMenu[$subKey]["Nombre"];
							echo '<li><a class="menuItem" href="'.$page.'"><i class="fa fa-circle-o"></i>'.$subVal.'</a></li>';
						}
					}
					echo '</ul></li>';
				}
			?>
			<script type="text/javascript">
				window.onload = function(e){ 
					$('.menuItem').click( function(event) {
						event.preventDefault();
						var optM = $(this).attr("href");
						$.post("./views/"+optM+"/"+optM).done(function( data ){$('#contentBody').html(data)});
					});

					$('#home, .treeview-menu > li > a').click( function(event) {
						event.preventDefault();
						$('#home, .treeview-menu > li > a').parent().removeClass('active');
						$('.treeview-menu > li > a').parent().parent().parent().removeClass('active');

						$(this).parent().addClass("active");
						$(this).parent().parent().parent().addClass("active");
						$('#menuTreeP').text( $(this).parent().parent().parent().children('a').text() );
						$('#menuTreeS').text($(this).text());
					});
					
				}
			</script>
		</ul>
	</section>
</aside>