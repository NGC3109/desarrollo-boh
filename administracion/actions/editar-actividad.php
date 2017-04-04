<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

if(isset($_POST['borrar'])){
	
	$query="DELETE FROM actividades WHERE id=:id";
	$stmt=$db->prepare($query);
	$stmt->bindParam(':id', $_POST['ida']);
	if($stmt->execute()){echo '<script>
self.location = "../actividades.php"
</script>';}
}
else{
$query="UPDATE actividades SET idColaborador=:idColaborador, idProducto=:idProducto, nombre=:nombre, descripcion=:descripcion, direccion=:direccion, comuna=:comuna, telefono=:telefono, email=:email, costo=:costo, foto=:foto, estado=:estado WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':idColaborador', $_POST['idColaborador']);
$stmt->bindParam(':idProducto', $_POST['idProducto']);
$stmt->bindParam(':nombre', $_POST['nombre']);
$stmt->bindParam(':descripcion', $_POST['descripcion']);
$stmt->bindParam(':direccion', $_POST['direccion']);
$stmt->bindParam(':comuna', $_POST['comuna']);
$stmt->bindParam(':telefono', $_POST['telefono']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':costo', $_POST['costo']);
$stmt->bindParam(':foto', $foto);
$stmt->bindParam(':estado', $_POST['estado']);
$stmt->bindParam(':id', $_POST['ida']);

if($_FILES['foto']['name']!="" && $_FILES['foto']['name']!=NULL){
$fecha=date('YmdHis');
$dir_name = "../../img/actividades/";
move_uploaded_file($_FILES['foto']['tmp_name'],$dir_name.$fecha.$_FILES['foto']['name']);
$foto=$fecha.$_FILES['foto']['name'];
}
else{$foto=$_POST['fotoA'];}
if($stmt->execute()){echo '<script>
self.location = "../editar-actividad.php?id='.$_POST['ida'].'"
</script>';}
}
}
else{
	header("Location:../signin.php");	
}

?>



