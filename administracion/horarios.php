<?php
session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('connections/db-settings.php');
include('load/precios.php');
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
        <link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		
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
											<span>Próximas Solicitudes</span>
										</a>
									</li>
                                    <li>
										<a href="historial-de-reservas.php">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Historial de Solicitudes</span>
										</a>
									</li>
									
                                    
                                    <li>
										<a href="lugares.php">
											<i class="fa fa-picture-o" aria-hidden="true"></i>
											<span>Lugares</span>
										</a>
									</li>
                                    <li class="nav-active">
										<a href="horarios.php">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span>Horarios</span>
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
						<h2>Horarios</h2>
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
						
								<h2 class="panel-title">Horarios</h2>
							</header>
							<div class="panel-body">
                                
                                <h4>Agregar Horario</h4>
                                <form id="agregar-horario" action="actions/agregar-horario.php" method="POST">
                               
                                <div class="row">
                                 <div class="col-md-3">
                                  <div class="form-group">
                                     <label class="control-label">Lugar</label>
                                     <select class="form-control" required name="idLugar">
                                     <option>Seleccionar</option>
                                      <? 
									     while($lugares=$stmt2->fetch(PDO::FETCH_ASSOC)){
										?>	
										<option value="<? echo $lugares['id']; ?>"><? echo $lugares['nombre']; ?></option> 
											 
									<?		 
										 }
									   ?>
                                     </select>  
                                  </div>
                                 </div>
                                 <div class="col-md-2">
                                  <div class="form-group">
                                     <label class="control-label">Hora</label>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" required data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "minuteStep": 30 }' name="hora">
													</div>
                                  </div>
                                 </div>
                                 
                                 <div class="col-md-3">
                                  <div class="form-group">
                                     <label class="control-label">Día</label>
                                     <select class="form-control" required name="dia">
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                     </select>  
                                  </div>
                                 </div>
                                 <div class="col-md-2">
                                  <div class="form-group">
                                     <label class="control-label">Tipo</label>
                                     <select class="form-control" required name="tipo">
                                      <option value="0">Seleccionar</option>
                                      <option value="1">Llegada</option>
                                      <option value="2">Salida</option>
                                     </select>  
                                  </div>
                                 </div>
                                 
                                 
                                 <div class="col-md-2">
                                  <div class="form-group">
                                     <input type="submit" class="btn btn-success pull-right" style="margin-top:27px;" value="Agregar">  
                                  </div>
                                 </div>
                                
                                
                                
                                </div>
                                </form>
                                <hr>
                                
                                <h4>Editar Horarios</h4>
                                
                                <? while($horarios=$stmt1->fetch(PDO::FETCH_ASSOC)){ ?>
                                <div id="extra-<? echo $horarios['id']; ?>">
                                <form id="editar-horario" action="actions/editar-horario.php" method="POST">
                                <input type="hidden" name="id" value="<? echo $horarios['id']; ?>">
                                <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                     <label class="control-label">Lugar</label>
                                     <select class="form-control" required name="idLugar">
                                     <option value="<? echo $horarios['idLugar']; ?>"><? $query3="SELECT nombre FROM lugares WHERE id = :id";
$stmt3= $db->prepare($query3);
$var=array();
$var[':id']=$horarios['idLugar'];
if(!$stmt3->execute($var)){echo "error query 3";} $nombreLugar=$stmt3->fetch(PDO::FETCH_ASSOC); echo $nombreLugar['nombre']; ?></option>
                                      <? $stmt2->execute();
									     while($idLugares2=$stmt2->fetch(PDO::FETCH_ASSOC)){
										?>	 
										<option value="<? echo $idLugares2['id']; ?>"><? echo $idLugares2['nombre']; ?></option> 
											 
									<?		 
										 }
									   ?>
                                     </select>  
                                  </div>
                                 </div>
                                 <div class="col-md-2">
                                  <div class="form-group">
                                     <label class="control-label">Hora</label>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" required data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "minuteStep": 30 }' value="<? echo $horarios['hora']; ?>" name="hora">
													</div>
                                  </div>
                                 </div>
                                 <div class="col-md-2">
                                  <div class="form-group">
                                     <label class="control-label">Día</label>
                                     <select class="form-control" required name="dia">
                                     <? if($horarios['dia']==0){ ?>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==1){ ?>
                                      <option value="1">Lunes</option>
                                      <option value="0">Todos</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==2){ ?>
                                      <option value="2">Martes</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==3){ ?>
                                      <option value="3">Miércoles</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==4){ ?>
                                      <option value="4">Jueves</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==5){ ?>
                                      <option value="5">Viernes</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==6){ ?>
                                      <option value="6">Sábado</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==7){ ?>
                                      <option value="7">Domingo</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==8){ ?>
                                      <option value="8">Lunes a Viernes</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="9">Sábado y Domingo</option>
                                      <? }elseif($horarios['dia']==9){ ?>
                                      <option value="9">Sábado y Domingo</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <option value="8">Lunes a Viernes</option>
                                      <? } ?>
                                      
                                      
                                     </select>  
                                  </div>
                                 </div>
                                 <div class="col-md-2">
                                  <div class="form-group">
                                     <label class="control-label">Tipo</label>
                                     <select class="form-control" required name="tipo">
                                     <? if($horarios['tipo']==0){ ?>
                                      <option value="0">Seleccionar</option>
                                      <option value="1">Llegada</option>
                                      <option value="2">Salida</option>
                                      <? }elseif($horarios['tipo']==1){ ?>
                                      <option value="1">Llegada</option>
                                      <option value="2">Salida</option>
                                      <? }elseif($horarios['tipo']==2){ ?>
                                      <option value="2">Salida</option
                                      ><option value="1">Llegada</option>
                                      <? } ?>
                                     </select>  
                                  </div>
                                 </div>
                                 <div class="col-md-1">
                                  <div class="form-group">
                                  <label class="control-label">Borrar</label>
                                  <input type="checkbox" class="form-control" name="borrar">  
                                    
                                  </div>
                                 </div>
                                
                                <div class="col-md-2">
                                  <div class="form-group">
                                  
                                     <input type="submit" class="btn btn-success pull-right" style="margin-top:27px;" value="Editar">  
                                  </div>
                                  
                                 </div>
                                
                                
                                </div>
                                <hr class="light">
                                </form>
                              </div>
                            <? } ?>
                            
                            
								
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
        <script src="assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>	
		
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
        <script>
		
		
		</script>
	</body>
</html>