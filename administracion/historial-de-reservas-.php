<?php
session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('connections/db-settings.php');
include('load/historial.php');

}
else
{
header("Location:signin.php");	
}


?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Getaway Intranet</title>
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">
        
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />
        <link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
        <link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
        <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
        
		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<!-- <a href="#" class="logo">
						<img  src="assets/images/logo.png" height="35" alt="" />
					</a> -->
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					
					
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<div class="profile-info" data-lock-name="">
								<span class="name"><? echo $_SESSION['user']; ?></span>
								<span class="role">Administrador</span>
							</div>
			                <i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.php"><i class="fa fa-user"></i> Editar Perfil</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="sign_out.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Menu
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="index.php">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span>Próximas Reservas</span>
										</a>
									</li>
									<li>
										<a href="nueva-reserva.php">
											<i class="fa fa-edit" aria-hidden="true"></i>
											<span>Nueva Reserva</span>
										</a>
									</li>
                                    <li>
										<a href="bloquear-horarios.php">
											<i class="fa fa-ban" aria-hidden="true"></i>
											<span>Bloquear Horarios</span>
										</a>
									</li>
                                    <li class="nav-active">
										<a href="historial-de-reservas.php">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Historial de Reservas</span>
										</a>
									</li>
                                    <li>
										<a href="lugares.php">
											<i class="fa fa-ticket" aria-hidden="true"></i>
											<span>Canchas y Extras</span>
										</a>
									</li>
                                    <li>
										<a href="horarios.php">
											<i class="fa fa-dollar" aria-hidden="true"></i>
											<span>Precios</span>
										</a>
									</li>
                                    <li>
										<a href="usuarios.php">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Usuarios</span>
										</a>
									</li>
                                    
      							</ul>
							</nav>
				        </div>
				    </div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Historial de Reservas</h2>
					</header>

					<!-- start: page -->
					<div class="row">
                    <!-- ACCORDION -->
                    
						<div class="col-md-12 col-lg-12 col-xl-12 col-xs-12">
                        
                         <section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Historial de Reservas</h2>
							</header>
							<div class="panel-body">
                           
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>Hora</th>
											<th>Cancha</th>
                                            <th>Extras</th>
											<th>Usuario / Referencia</th>
                                            <th>Precio</th>
											<th>Pagado</th>
                                            
										</tr>
									</thead>
									<tbody>
                                    <? while($reservas=$stmtr->fetch(PDO::FETCH_ASSOC)){ if($reservas['fecha_inicio']==$reservas['fecha_fin'] && $reservas['fecha_inicio']<date('Y-m-d'))
									{ ?>
									    <tr id="<? echo 'fila_'.$reservas['id']; ?>">
                                         <td><? echo $reservas['fecha_inicio'];  ?></td>
                                         <td><? echo date('H:i', strtotime($reservas['hora_inicio']));  ?></td>
                                         <td><?  
										  $vars=array();
							   $query_l="SELECT * FROM items WHERE id = :id";
							   $stmtl= $db->prepare($query_l);
							   $vars[':id']=$reservas['cancha'];
							   if(!$stmtl->execute($vars)){echo "error query L";}
							   $nombre_cancha=$stmtl->fetch(PDO::FETCH_ASSOC); 
							   echo $nombre_cancha['nombre'];
										  ?></td>
                                         <td><? 
										        $echoextras=array();
												$extrasa=array();
												$e=$reservas['extras'];
												$extrasa=explode(', ',$e);
												for($p=0;$p<count($extrasa);$p++){
								$query_e="SELECT * FROM items WHERE id = :id";
							   $stmte= $db->prepare($query_e);
							   $vars[':id']=$extrasa[$p];
							   if(!$stmte->execute($vars)){echo "error query L";}
							   $nombre_extra=$stmte->fetch(PDO::FETCH_ASSOC); 
							 
							    array_push($echoextras,$nombre_extra['nombre']);
													
													} $extrasamostrar=implode(', ',$echoextras); echo $extrasamostrar;  ?></td>
                                         <td><? echo $reservas['nombre'];  ?></td>
                                         <td><? echo '$ '.number_format($reservas['monto']);  ?></td>
                                         <td>
										<? if($reservas['pagado']==0){  ?>
                                           No
                                           
										<? }elseif($reservas['pagado']==1){ ?>
                                           Si
                                        <? } ?> 
                                       
                                         </td>
                                          
                                        </tr>
                                        
                                    <? }} ?>    
									</tbody>
								</table>
							</div>
						</section>
                            
                        
                        </div>
                       
                     <!-- END ACCORDION -->   
					</div>
                   <!-- end: page -->
				</section>
			</div>
        </section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/summernote/summernote.js"></script>		
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
        
        
        
        <script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
        
	</body>
</html>