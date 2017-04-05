<?php
session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');
require_once('../connections/getaway.php');
mysql_select_db($database_nyscia, $nyscia) or die(mysql_error());
include('../load/codigos.php');

}
else
{
header("Location:../signin.php");	
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
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

        
		<!-- Head Libs -->
		<script src="../assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="#" class="logo">
						<img  src="../assets/images/logo.png" height="35" alt="" />
					</a>
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
								<? //if ($_SESSION['idTipoUsuario'] == 2) {?>
								<span class="role"><? //echo $_SESSION['idTipoUsuario']; ?></span>
								<? //} ?>
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
									<li class="nav-active">
										<a href="index_colaboradores.php">
											<i class="fa fa-qrcode" aria-hidden="true"></i>
											<span>Ingreso de codigos</span>
										</a>
									</li>
                                    <li>
										<a href="facturas.php">
											<i class="fa fa-money" aria-hidden="true"></i>
											<span>Facturas</span>
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
						<h2>Crear Códigos</h2>
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
									<h2 class="panel-title">Colaborador</h2>
								</header>
								<div class="panel-body">
                                
	                                <!--<form id="agregar-codigo-validacion" action="../actions/agregar-codigo-validacion.php" method="POST">-->
	                                <form method="post" id="formulario" enctype="multipart/form-data">
		                                <div class="row">
			                                <div class="col-md-3">
			                                  <div class="form-group">
			                                     <label class="control-label">Ingresar codigo</label>
			                                     <input type="text" class="form-control" name="codigo" id="codigo">
			                                  </div>
			                                </div>
			                                <div class="col-md-3">
			                                  <div class="form-group">
			                                     <label class="control-label">Foto</label>
			                                     <input type="file" name="foto" id="foto" class="form-control">
			                                     <input type="submit" name="add" id="add" class="btn btn-success pull-right" style="margin-top:27px;" value="Ingresar"> 
			                                  </div>
			                                </div>
			                                <div class="col-sm-12" id="resultado" style="margin-top:27px;">
			                                	
			                                </div>
		                                </div>
	                               </form> 
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
									</div>

									<h2 class="panel-title">Actividades</h2>
								</header>
								<div class="panel-body">
	                                <table class="table table-bordered table-striped mb-none" id="datatable-default">
										<thead>
											<tr>
												<th>Actividad</th>
												<th>Categoria</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
	                                    <? while($codigos=$stmtdeta->fetch(PDO::FETCH_ASSOC)){ ?>
											<tr>
												<td><? echo $codigos['NomActiv']; ?></td>
												<td><? echo $codigos['NomCa']; ?></td>
												<td><i class="fa fa-eye" aria-hidden="true"></i></td>
											</tr>
	                                     <? } ?> 
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
		<script src="../assets/vendor/jquery/jquery.js"></script>
		<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script type="text/javascript">

				$(document).ready(function(){
					$("#add").click(function(){
					    validate();
					});
				});

				function validate(idCodigo,foto){

					var formData = new FormData(document.getElementById("formulario"));

					$.ajax({
		                data:  formData,
		                url:   '../actions/agregar-codigo-validacion.php',
		                type:  'POST',
		                beforeSend: function () {
                        	$("#resultado").html("Procesando, espere por favor...");
		                },
		                success:  function (response) {
                        	$("#resultado").html(response);
		                }
	        		});

				}
		</script>


	</body>
</html>



























