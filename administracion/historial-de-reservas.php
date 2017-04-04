<?php
session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('connections/db-settings.php');
require_once('connections/getaway.php');
mysql_select_db($database_nyscia, $nyscia) or die(mysql_error());
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
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

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
                                    <li class="nav-active">
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
                                    <li>
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
						<h2>Historial de Solicitudes</h2>
					</header>

					<!-- start: page -->
					<div class="row">
                    <!-- ACCORDION -->
                    
						<div class="col-md-12 col-lg-12 col-xl-12 col-xs-12">
                        <? while($lugares_general=$stmt0->fetch(PDO::FETCH_ASSOC)){ ?>
                         <section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Historial de Solicitudes <? echo $lugares_general['nombre']; ?></h2>
							</header>
							<div class="panel-body" style="overflow-x:scroll;">
                           	<table class="table table-bordered table-striped mb-none table-responsive" id="datatable-tabletools-<? echo $lugares_general['id']; ?>">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>Horario</th>
											<th>Usuario</th>
                                            <th>Estado</th>
                                        </tr>
									</thead>
									<tbody>
                                    <?
									$sqlVarss=array();
                                    $queryr="SELECT * FROM reservas ORDER BY fecha ASC";
                                    $stmtr= $db->prepare($queryr);
                                    if(!$stmtr->execute($sqlVarss)){echo "error queryr";}
									while($reservas=$stmtr->fetch(PDO::FETCH_ASSOC)){ 
									
									$vars2=array();
							        $query_l2="SELECT * FROM horarios WHERE id = :idHorario";
							        $stmtl2= $db->prepare($query_l2);
							        $vars2[':idHorario']=$reservas['idHorario'];
							        if(!$stmtl2->execute($vars2)){echo "error query L";}
							        $horass=$stmtl2->fetch(PDO::FETCH_ASSOC);
									
									if($reservas['fecha']<date('Y-m-d') && $horass['idLugar']==$lugares_general['id'])
									{ ?>
									    <tr>
                                         <td><? echo date('d-m-Y', strtotime($reservas['fecha']));  ?></td>
                                         <td><? echo date('H:i', strtotime($horass['hora'])); ?></td>
                                         <td>
                                         <? $usuarios= "SELECT * FROM members WHERE id='".$reservas['idUsuario']."'";
$usuarios_query = mysql_query($usuarios, $nyscia) or die(mysql_error());
$usuario=mysql_fetch_array($usuarios_query); 
echo $usuario['actividad'].', '.$usuario['nombre'].' '.$usuario['apellido'].', '.$usuario['telefono'].', '.$usuario['email'];
 ?>
                                         
                                         </td>
                                                                                  
                                         <td id="td_<? echo $reservas['id']; ?>" class="<? if($reservas['estado']==0){ echo 'espera'; }elseif($reservas['estado']==1){ echo 'camino';}elseif($reservas['estado']==2){ echo 'arribado';}elseif($reservas['estado']==10){ echo 'cancelado';} ?>">
                                         
                                         <select id="estado_<? echo $reservas['id']; ?>" class="form-control" name="estado_<? echo $reservas['id']; ?>">
										<? if($reservas['estado']==0){  ?>
                                           <option value="0">En bodega</option>
                                           <option value="1">En camino</option>
                                           <option value="2">En el destino</option>
                                           <option value="3">Finalizado</option>
                                           <option value="10">Cancelado</option>
										<? }elseif($reservas['estado']==1){ ?>
                                          <option value="1">En camino</option>
                                          <option value="2">En el destino</option>
                                          <option value="3">Finalizado</option>
                                          <option value="10">Cancelado</option>
                                          <option value="0">En bodega</option>
                                          <? }elseif($reservas['estado']==2){ ?>
                                          <option value="2">En el destino</option>
                                          <option value="3">Finalizado</option>
                                          <option value="10">Cancelado</option>
                                          <option value="0">En bodega</option>
                                          <option value="1">En camino</option>
                                          <? }elseif($reservas['estado']==3){ ?>
                                          <option value="3">Finalizado</option>
                                          <option value="10">Cancelado</option>
                                          <option value="0">En bodega</option>
                                          <option value="1">En camino</option>
                                          <option value="2">En el destino</option>
                                          <? }elseif($reservas['estado']==10){ ?>
                                          <option value="10">Cancelado</option>
                                          <option value="0">En bodega</option>
                                          <option value="1">En camino</option>
                                          <option value="2">En el destino</option>
                                          <option value="3">Finalizado</option>
                                          <? } ?> 
                                         </select>
                                       
                                         </td>
                                          
                                        </tr>
                                        
                                    <? }} ?>    
									</tbody>
								</table>
							</div>
						</section>
                       <? } ?>     
                        
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
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script>
		<? while($lugaress=$stmt1->fetch(PDO::FETCH_ASSOC)){ ?>
		(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-tabletools-<? echo $lugaress['id']; ?>');

		$table.dataTable({
			"order": [[ 0, "desc" ]]
			
		});

	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);
<? } ?>
		
		
		<? while($reservas=$stmth->fetch(PDO::FETCH_ASSOC)){ if($reservas['fecha']<date('Y-m-d'))
									{ ?>
			

             $(document).on("change", "#estado_<? echo $reservas['id']; ?>", function() { 
			 
			   
               
               var data = new FormData();
			   data.append("id", <? echo $reservas['id']; ?>);
			   data.append("estado", $("#estado_<? echo $reservas['id']; ?>").val());
			   $.ajax({
                data: data,
                type: "POST",
                url: 'actions/cambiar_pagado.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                     $('#estado_<? echo $reservas['id']; ?>').html(response);
					 if($("#estado_<? echo $reservas['id']; ?>").val()==0){
					 $("#td_<? echo $reservas['id']; ?>").removeClass();
					 $("#td_<? echo $reservas['id']; ?>").addClass("espera");
					 }
					 if($("#estado_<? echo $reservas['id']; ?>").val()==1){
					 $("#td_<? echo $reservas['id']; ?>").removeClass();
					 $("#td_<? echo $reservas['id']; ?>").addClass("camino");
					 }
					 if($("#estado_<? echo $reservas['id']; ?>").val()==2){
					 $("#td_<? echo $reservas['id']; ?>").removeClass();
					 $("#td_<? echo $reservas['id']; ?>").addClass("arribado");
					 }
					 if($("#estado_<? echo $reservas['id']; ?>").val()==3){
					 $("#td_<? echo $reservas['id']; ?>").removeClass();
					 $("#td_<? echo $reservas['id']; ?>").addClass("finalizado");
					 }
					 if($("#estado_<? echo $reservas['id']; ?>").val()==10){
					 $("#td_<? echo $reservas['id']; ?>").removeClass();
					 $("#td_<? echo $reservas['id']; ?>").addClass("cancelado");
					 }
                }
            });
			

});	
									
									
		
		<? }} ?>
		</script>
	</body>
</html>