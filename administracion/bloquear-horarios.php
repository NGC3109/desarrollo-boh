<?php
session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('connections/db-settings.php');
include('load/nueva-reserva.php');
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
											<span>Próximas Reservas</span>
										</a>
									</li>
									<li>
										<a href="nueva-reserva.php">
											<i class="fa fa-edit" aria-hidden="true"></i>
											<span>Nueva Reserva</span>
										</a>
									</li>
                                    <li class="nav-active">
										<a href="bloquear-horarios.php">
											<i class="fa fa-ban" aria-hidden="true"></i>
											<span>Bloquear Horarios</span>
										</a>
									</li>
                                    <li>
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
						<h2>Bloquear Horarios</h2>
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
						
								<h2 class="panel-title">Bloquear Horarios y Días</h2>
							</header>
							<div class="panel-body">
                                
                                <h4>Nuevo</h4>
                                <form id="reserva_l" action="actions/reserva_l.php" method="post">
                                <div class="row">
                                 <div class="col-md-2">
                                 <label class="control-label">Nombre</label>
                                 <input type="text" class="form-control" name="nombre"> 
                                 </div>
                                 <div class="col-md-2">
                                 <label class="control-label">Día</label>
                                 <select class="form-control" name="dia">
                                  <option value="0">Todos</option>
                                  <option value="1">Lunes</option>
                                  <option value="2">Martes</option>
                                  <option value="3">Miércoles</option>
                                  <option value="4">Jueves</option>
                                  <option value="5">Viernes</option>
                                  <option value="6">Sábado</option>
                                  <option value="7">Domingo</option>
                                 </select> 
                                 </div>
                                 
												
								  <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="control-label">Fechas</label>
													<div class="input-daterange input-group" data-plugin-datepicker>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control datepickers" name="start">
														<span class="input-group-addon">a</span>
														<input type="text" class="form-control datepickers" name="end">
													</div>
												</div>
											</div>
                                            
                                            <div class="col-md-3">
                                            <div class="row"><div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label">Hora Inicio</label>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input id="hora_inicio_l" type="text" required data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "minuteStep": 30 }' name="hora_inicio_l">
									</div>
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label">Hora Fin</label>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input id="hora_fin_l" type="text" required data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "minuteStep": 30 }' name="hora_fin_l">
									</div>
                                  </div>
                                 </div>
								</div>
							   </div>
                               <div class="col-md-2">
                               <label class="control-label">Cancha</label>
                               <select class="form-control" name="cancha_l">
                               <? $sqlVars[':tipo']=0;
if(!$stmt0->execute($sqlVars)){echo "error query 0";} while($canchas_l=$stmt0->fetch(PDO::FETCH_ASSOC)){ ?>
                               <option value="<? echo $canchas_l['id']; ?>"><? echo $canchas_l['nombre']; ?></option>
                               
                               
                               <? } ?>
                               </select>
                               </div>
                                 
                                 
                              
                                 
                                 
                                 </div>
                                 <hr class="light short">
                                 <div class="row">
                                 <div class="col-md-12">
                                 <input type="submit" class="btn btn-success pull-right" value="Agregar">
                                 </div>
                                 
                                 </div>
                         </form>
                         
                         <hr>
                         <h4>Editar</h4>
                         <? while($reservas_l=$stmt->fetch(PDO::FETCH_ASSOC)){ if($reservas_l['fecha_fin']>$reservas_l['fecha_inicio']){ ?>
                         <div id="edicion-reservas-l">
                         <form id="reserva_l" action="actions/editar_reserva_l.php" method="post">
                         <input type="hidden" name="id" value="<? echo $reservas_l['id']; ?>">
                                <div class="row">
                                 <div class="col-md-2">
                                 <label class="control-label">Nombre</label>
                                 <input type="text" class="form-control" name="nombre" value="<? echo $reservas_l['nombre']; ?>"> 
                                 </div>
                                 <div class="col-md-2">
                                 <label class="control-label">Día</label>
                                 <select class="form-control" required name="dia">
                                     <? if($reservas_l['dia']==0){ ?>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==1){ ?>
                                      <option value="1">Lunes</option>
                                      <option value="0">Todos</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==2){ ?>
                                      <option value="2">Martes</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==3){ ?>
                                      <option value="3">Miércoles</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==4){ ?>
                                      <option value="4">Jueves</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==5){ ?>
                                      <option value="5">Viernes</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="6">Sábado</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==6){ ?>
                                      <option value="6">Sábado</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="7">Domingo</option>
                                      <? }elseif($reservas_l['dia']==7){ ?>
                                      <option value="7">Domingo</option>
                                      <option value="0">Todos</option>
                                      <option value="1">Lunes</option>
                                      <option value="2">Martes</option>
                                      <option value="3">Miércoles</option>
                                      <option value="4">Jueves</option>
                                      <option value="5">Viernes</option>
                                      <option value="6">Sábado</option>
                                      <? } ?>
                                     </select> 
                                 </div>
                                 
												
								  <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="control-label">Fechas</label>
													<div class="input-daterange input-group" data-plugin-datepicker>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control datepickers" name="start" value="<? echo $reservas_l['fecha_inicio']; ?>">
														<span class="input-group-addon">a</span>
														<input type="text" class="form-control datepickers" name="end" value="<? echo $reservas_l['fecha_fin']; ?>">
													</div>
												</div>
											</div>
                                            
                                            <div class="col-md-3">
                                            <div class="row"><div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label">Hora Inicio</label>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input id="hora_inicio_l" type="text" required data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "minuteStep": 30 }' name="hora_inicio_l" value="<? echo $reservas_l['hora_inicio']; ?>">
									</div>
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label">Hora Fin</label>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input id="hora_fin_l" type="text" required data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "minuteStep": 30 }' name="hora_fin_l" value="<? echo $reservas_l['hora_fin']; ?>">
									</div>
                                  </div>
                                 </div>
								</div>
							   </div>
                               <div class="col-md-2">
                               <label class="control-label">Cancha</label>
                               <select class="form-control" name="cancha_l">
                               <option  value="<? echo $reservas_l['cancha']; ?>"><? 
							   $vars=array();
							   $query_l="SELECT * FROM items WHERE id = :id";
							   $stmtl= $db->prepare($query_l);
							   $vars[':id']=$reservas_l['cancha'];
							   if(!$stmtl->execute($vars)){echo "error query L";}
							   $nombre_cancha=$stmtl->fetch(PDO::FETCH_ASSOC); 
							   echo $nombre_cancha['nombre']; ?>
                               
                               </option>
                               <? $sqlVars[':tipo']=0;
if(!$stmt0->execute($sqlVars)){echo "error query 0";} while($canchas_l=$stmt0->fetch(PDO::FETCH_ASSOC)){ ?>
                               <option value="<? echo $canchas_l['id']; ?>"><? echo $canchas_l['nombre']; ?></option>
                               
                               
                               <? } ?>
                               </select>
                               </div>
                                 
                                 
                              
                                 
                                 
                                 </div>
                                 <hr class="light short">
                                 <div class="row">
                                 <div class="col-md-1 col-md-offset-10">
                                 <label class="control-label text-center">Borrar</label>
                                 <input type="checkbox" class="form-control" name="borrar">
                                 </div>
                                 <div class="col-md-1">
                                 <input type="submit" class="btn btn-success pull-right" style="margin-top:30px;" value="Editar">
                                 </div>
                                 
                                 </div>
                                 <hr>
                                 
                         </form>
                         
                         
                         </div>   
                         <? } } ?>   
								
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
		
var today = new Date()

$('.datepickers').datepicker({
	    format: 'yyyy-mm-dd',
        language: "es",
		startDate: new Date(),
		todayHighlight: true,
		endDate: new Date(today.getTime() + 24 * 60 * 60 * 1000 * 60 * 6)
});


$('#datepicker').datepicker({
	    format: 'yyyy-mm-dd',
        language: "es",
		startDate: new Date(),
		todayHighlight: true,
		endDate: new Date(today.getTime() + 24 * 60 * 60 * 1000 * 60)
});
$("#datepicker").on("changeDate", function(event) {
    $("#fecha").val(
        $("#datepicker").datepicker('getFormattedDate')
     )
	 
	        var data = new FormData();
            data.append("fecha", $("#fecha").val());
			$.ajax({
                data: data,
                type: "POST",
                url: 'actions/verificar-fecha.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#horas').html(response);
                }
            });
	 
	 
});

$(document).on("change", "#hora_inicio", function() { 

               var data = new FormData();
            data.append("fecha", $("#fecha").val());
			data.append("hora_inicio", $("#hora_inicio").val());
			data.append("hora_fin", $("#hora_fin").val());
			$.ajax({
                data: data,
                type: "POST",
                url: 'actions/verificar-fecha-hora.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#mostrar-canchas').html(response);
                }
            });

            

});   
$(document).on("change", "#hora_fin", function() { 

               var data = new FormData();
            data.append("fecha", $("#fecha").val());
			data.append("hora_inicio", $("#hora_inicio").val());
			data.append("hora_fin", $("#hora_fin").val());
			$.ajax({
                data: data,
                type: "POST",
                url: 'actions/verificar-fecha-hora.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#mostrar-canchas').html(response);
                }
            });

            

});

$(document).on("change", "input[name=cancha]", function() { 

               var data = new FormData();
			   <? $sqlVars[':tipo']=1;
if(!$stmt1->execute($sqlVars)){echo "error query 0";} while($extras_sc=$stmt1->fetch(PDO::FETCH_ASSOC)){ ?>          if($('#extra-<? echo $extras_sc['id']; ?>').is(':checked')){
	             data.append("extra-<? echo $extras_sc['id']; ?>", "1");
	        }                                                    <? } ?>
            data.append("fecha", $("#fecha").val());
			data.append("hora_inicio", $("#hora_inicio").val());
			data.append("hora_fin", $("#hora_fin").val());
			data.append("cancha", $("input[name=cancha]:checked").val());
			$.ajax({
                data: data,
                type: "POST",
                url: 'actions/seleccion-cancha.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#precio').html(response);
                }
            });

            

});

$(document).on("click", "#agregar-reserva", function() { 

               var data = new FormData();
			   <? $sqlVars[':tipo']=1;
if(!$stmt1->execute($sqlVars)){echo "error query 0";} while($extras_sc=$stmt1->fetch(PDO::FETCH_ASSOC)){ ?>          if($('#extra-<? echo $extras_sc['id']; ?>').is(':checked')){
	             data.append("extra-<? echo $extras_sc['id']; ?>", "1");
	        }                                                    <? } ?>
            data.append("fecha", $("#fecha").val());
			data.append("hora_inicio", $("#hora_inicio").val());
			data.append("hora_fin", $("#hora_fin").val());
			data.append("nombre", $("#referencia").val());
			data.append("cancha", $("input[name=cancha]:checked").val());
			$.ajax({
                data: data,
                type: "POST",
                url: 'actions/agregar-nueva-reserva.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#reserva-fin').html(response);
                }
            });

            

});

<? $sqlVars[':tipo']=1;
if(!$stmt5->execute($sqlVars)){echo "error query 0";} while($extras_cambio=$stmt5->fetch(PDO::FETCH_ASSOC)){ ?>
$(document).on("change", "#extra-<? echo $extras_cambio['id']; ?>", function() { 

               var data = new FormData();
			   <? $sqlVars[':tipo']=1;
if(!$stmt1->execute($sqlVars)){echo "error query 0";} while($extras_sc=$stmt1->fetch(PDO::FETCH_ASSOC)){ ?>          if($('#extra-<? echo $extras_sc['id']; ?>').is(':checked')){
	             data.append("extra-<? echo $extras_sc['id']; ?>", "1");
	        }                                                    <? } ?>
            data.append("fecha", $("#fecha").val());
			data.append("hora_inicio", $("#hora_inicio").val());
			data.append("hora_fin", $("#hora_fin").val());
			data.append("cancha", $("input[name=cancha]:checked").val());
			$.ajax({
                data: data,
                type: "POST",
                url: 'actions/seleccion-cancha.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#precio').html(response);
                }
            });

            

});

<? } ?>

                                       
                                       
                                    

		
		/*$(document).on("change", "#fecha", function() { 
   $.ajax({ 
       data: $(this).serialize(), 
        type: $(this).attr('method'), 
        url: $(this).attr('action'), 
        success: function(response) { 
           
		    $('#error').html(response);	
			
        }
    });
    return false;
});*/
		
		
		
		</script>
	</body>
</html>