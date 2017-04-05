<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{

require_once('../connections/db-settings.php');
$db = pdoConnect();

	$queryco="SELECT id, codigo FROM codigos WHERE codigo = :codVal";
    $stmtco= $db->prepare($queryco); 
	$stmtco->bindParam(':codVal', $_POST["codigo"]);
    if(!$stmtco->execute()){echo "error query 0";}
	$valiCodigo=$stmtco->fetch(PDO::FETCH_ASSOC);

/*SEGUNDA VALIDACION PARA SABER SI EL CODIGO YA FUE REGISTRADO EN LA BBDD*/

//C:\fakepath\1115e894b97176206353f3869690e091.jpg

	$queryVal="SELECT idCodigo FROM codigosValidadosC WHERE idCodigo = :codVal";
    $stmtval= $db->prepare($queryVal); 
	$stmtval->bindParam(':codVal', $_POST["codigo"]);
    if(!$stmtval->execute()){echo "error query 0";}
	$segValida=$stmtval->fetch(PDO::FETCH_ASSOC);

	if ($segValida["idCodigo"]) {

		echo '<div class="alert alert-danger">
								  <strong>Error!</strong> El codigo ingresado ya fue registrado anteriormente.
								</div>';
		
	}else{
			if ($valiCodigo["codigo"]) {
					$query = "INSERT INTO codigosValidadosC (idColaborador, idCodigo, url_img) VALUES (:idColaborador, :idCodigo, :url_img)";
						$stmt=$db->prepare($query);
						$stmt->bindParam(':idColaborador', $_POST['idColaborador']);
						$stmt->bindParam(':idCodigo', $valiCodigo["codigo"]);
						$stmt->bindParam(':url_img', $foto);


						$fecha=date('YmdHis');
						$dir_name = "../../img/codigos/";
						@move_uploaded_file($_FILES['foto']['tmp_name'],$dir_name.$fecha.$_FILES['foto']['name']);
						@$foto=$fecha.$_FILES['foto']['name'];

						if ($foto != NULL) {
							if($stmt->execute()){
							echo '<div class="alert alert-success">
									  <strong>Exito!</strong> El codigo a sido guardado, validado y verificado.
								</div>';
							}else{
								echo '<div class="alert alert-danger">
								  <strong>Error!</strong> El codigo ingresado no se encuentra en nuestras bases de datos, favor confirmar e ingresar nuevamente.
								</div>';
							}
						}else{
							echo '<div class="alert alert-danger">
								  <strong>Error!</strong> Debe ingresar una imagen correspondiente al codigo.
								</div>';
						}
						
			}else{

				echo '<div class="alert alert-danger">
								  <strong>Error!</strong> El codigo ingresado no se encuentra en nuestras bases de datos, favor confirmar e ingresar nuevamente.
								</div>';
			}

	}
	
	




}else{
	header("Location:../signin.php");
}




?>



