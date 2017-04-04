<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO actividades (idColaborador, idProducto, nombre, descripcion, direccion, comuna, telefono, email, costo, foto, estado, cant_personas) VALUES (:idColaborador, :idProducto, :nombre, :descripcion, :direccion, :comuna, :telefono, :email, :costo, :foto, :estado, :cant_personas)";

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
$stmt->bindParam(':cant_personas', $_POST['cant_personas']);


$fecha=date('YmdHis');
$dir_name = "../../img/actividades/";
move_uploaded_file($_FILES['foto']['tmp_name'],$dir_name.$fecha.$_FILES['foto']['name']);
$foto=$fecha.$_FILES['foto']['name'];

if($stmt->execute()){echo '<script>
self.location = "../actividades.php"
</script>';}
}
else{
	header("Location:../signin.php");	
}


?>



