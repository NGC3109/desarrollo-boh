<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
        <title>Iniciar Sesión</title>
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="waterwelon.cl">
        
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

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
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="signin.php" class="logo pull-left">
					<img src="assets/images/logo.png" alt="" style="margin-top:-20px;" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Iniciar Sesión</h2>
					</div>
					<div class="panel-body" style="background:rgba(255,255,255,0.9);">
						<form action ="controller/login.php" method= "POST" >
							<div class="form-group mb-lg">
								<label>Usuario</label>
								<div class="input-group input-group-icon">
									<input name="usuario" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Clave</label>
									<a href="recover-password.php" class="pull-right">Recuperar Clave</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="pass" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Recordarme</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<input type="submit" class="btn btn-primary" value="Iniciar Sesión" />
									
								</div>
							</div>

						

						</form>
					</div>
				</div>
                <div id="error"></div>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
        
        <script>
		$(document).on("submit", "#validate_user", function() { // catch the form's submit event
    $.ajax({ // create an AJAX call...
        data: $(this).serialize(), // get the form data
        type: $(this).attr('method'), // GET or POST
        url: $(this).attr('action'), // the file to call
        success: function(response) { // on success..
           
		    $('#error').html(response);	
			
        }
    });
    return false; // cancel original event to prevent form submitting
});
//
//
//$(document).on("submit", "#recover", function() { // catch the form's submit event
//    $.ajax({ // create an AJAX call...
//        data: $(this).serialize(), // get the form data
//        type: $(this).attr('method'), // GET or POST
//        url: $(this).attr('action'), // the file to call
//        success: function(response) { // on success..
//           
//		    $('#error').html(response);	
//			
//        }
//    });
//    return false; // cancel original event to prevent form submitting
//});
		</script>

	</body>
</html>