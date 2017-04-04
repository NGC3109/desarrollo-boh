<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

	if(isset($_POST['borrar'])){
		
		$query="DELETE FROM productos WHERE id=:id";
		$stmt=$db->prepare($query);
		$stmt->bindParam(':id', $_POST['idp']);
		if($stmt->execute()){echo '<script>
	self.location = "../productos.php"
	</script>';}
	}
	else{
	$query="UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio=:precio, stock=:stock, foto=:foto WHERE id=:id";

	$stmt=$db->prepare($query);

	$stmt->bindParam(':nombre', $_POST['nombre']);
	$stmt->bindParam(':descripcion', $_POST['descripcion']);
	$stmt->bindParam(':precio', $_POST['precio']);
	$stmt->bindParam(':stock', $_POST['stock']);
	$stmt->bindParam(':foto', $foto);
	$stmt->bindParam(':id', $_POST['idp']);
	$fecha=date('YmdHis');
	$dir_name = "../../img/productos/";
	move_uploaded_file($_FILES['foto']['tmp_name'],$dir_name.$fecha.$_FILES['foto']['name']);
	$foto=$fecha.$_FILES['foto']['name'];

		if($stmt->execute()){

				echo '<script>
			self.location = "../editar-producto.php?id='.$_POST['idp'].'"
			</script>';
		}
	}
}
else{
	header("Location:../signin.php");	
}

?>
