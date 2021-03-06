<?php
session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('connections/db-settings.php');
require_once('connections/getaway.php');
mysql_select_db($database_nyscia, $nyscia) or die(mysql_error());
include('load/productos.php');

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
        <link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />
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
					<a href="#" class="logo">
						<img  src="assets/images/logo.png" height="35" alt="" />
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
											<i class="fa fa-qrcode" aria-hidden="true"></i>
											<span>Creación de Códigos</span>
										</a>
									</li>
                                    <li>
										<a href="gestion-codigos.php">
											<i class="fa fa-code-fork" aria-hidden="true"></i>
											<span>Gestión de Códigos</span>
										</a>
									</li>
                                    <li>
										<a href="ventas.php">
											<i class="fa fa-money" aria-hidden="true"></i>
											<span>Ventas</span>
										</a>
									</li>
                                    <li>
										<a href="productos.php">
											<i class="fa fa-gift" aria-hidden="true"></i>
											<span>Productos</span>
										</a>
									</li>
                                    <li class="nav-active">
										<a href="actividades.php">
											<i class="fa fa-picture-o" aria-hidden="true"></i>
											<span>Actividades</span>
										</a>
									</li>
									<li>
										<a href="colaboradores.php">
											<i class="fa fa-group" aria-hidden="true"></i>
											<span>Colaboradores</span>
										</a>
									</li>
                                    <li>
										<a href="clientes.php">
											<i class="fa fa-male" aria-hidden="true"></i>
											<span>Clientes</span>
										</a>
									</li>
                                    <li>
										<a href="usuarios.php">
											<i class="fa fa-child" aria-hidden="true"></i>
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
						<h2>Productos</h2>
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

									<h2 class="panel-title">Editar Producto <? echo $productoE['nombre']; ?></h2>
								</header>
								<div class="panel-body">
                                
                                <form id="agregar-horario" action="actions/editar-producto.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="idp" id="idp" value="<? echo $productoE['id']; ?>">
                               
                                <div class="row">
                                <div class="col-md-6">
                                <div class="row">
	                                <div class="col-md-6">
	                                  <div class="form-group">
	                                     <label class="control-label">Nombre</label>
	                                     <input type="text" class="form-control" name="nombre" id="nombre" value="<? echo $productoE['nombre']; ?>">
	                                  </div>
	                                 </div>

	                                  <div class="col-md-6">
	                                  <div class="form-group">
	                                     <label class="control-label">Precio</label>
	                                     <input type="text" class="form-control" name="precio" id="precio" value="<? echo $productoE['precio']; ?>">
	                                  </div>
	                                 </div>

	                                  <div class="col-md-6">
	                                  <div class="form-group">
	                                     <label class="control-label">Stock</label>
	                                     <input type="text" class="form-control" name="stock" id="stock" value="<? echo $productoE['stock']; ?>">
	                                  </div>
	                                 </div>
                                 
                                 <div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label">Cambiar Foto</label>
                                     <input type="file" class="form-control" name="foto" id="foto">
                                     <input type="hidden" name="fotoA" id="fotoA" value="<? echo $productoE['foto']; ?>">
                                     <img src="../img/productos/<? echo $productoE['foto']; ?>" class="img-responsive">
                                     
                                  </div>
                                 </div>
                                 </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label">Descripción</label>
                                     <textarea class="form-control" name="descripcion" id="descripcion"  data-plugin-summernote data-plugin-options='{ "height": 190, "codemirror": { "theme": "ambiance" } }'>
                                     <? echo $productoE['descripcion']; ?>
                                     </textarea>
                                  </div>
                                 </div>
                                 
                                 </div>
                                 
                                 <div class="row">
                                 
                                 <div class="col-md-1 col-md-offset-10">
                                  <div class="form-group">
                                     <label class="control-label text-center">Borrar</label>
                                     <input type="checkbox" class="form-control" name="borrar" id="borrar">
                                  </div>
                                 </div>
                                 
                                 <div class="col-md-1">
                                  <div class="form-group">
                                     <input type="submit" class="btn btn-success pull-right" style="margin-top:27px;" value="Editar">  
                                  </div>
                                 </div>
                                
                                
                                
                                </div>
                                </form>
									
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Editar Productos</h2>
								</header>
								<div class="panel-body">
                                
                                <table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Editar</th>
										</tr>
									</thead>
									<tbody>
                                    <? while($producto=$stmt0->fetch(PDO::FETCH_ASSOC)){ ?>
										<tr>
                                            <td><? echo $producto['nombre']; ?></td>
                                            <td><? echo $producto['descripcion']; ?></td>
                                            <td><? echo $producto['precio']; ?></td>
                                            <td><? echo $producto['stock']; ?></td>
                                            <td><a href="editar-producto.php?id=<? echo $producto['id']; ?>"><i class="fa fa-pencil"></i></a></td>
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
		<script src="assets/vendor/summernote/summernote.js"></script>
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
		
		</script>
	</body>
</html>