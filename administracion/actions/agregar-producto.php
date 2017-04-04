<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{

require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO productos (nombre, descripcion, precio, stock, foto) VALUES (:nombre, :descripcion, :precio, :stock, :foto)";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $_POST['nombre']);
$stmt->bindParam(':descripcion', $_POST['descripcion']);
$stmt->bindParam(':precio', $_POST['precio']);
$stmt->bindParam(':stock', $_POST['stock']);
$stmt->bindParam(':foto', $foto);
$fecha=date('YmdHis');
$dir_name = "../../img/productos/";
move_uploaded_file($_FILES['foto']['tmp_name'],$dir_name.$fecha.$_FILES['foto']['name']);
$foto=$fecha.$_FILES['foto']['name'];

if($stmt->execute()){echo '<script>
self.location = "../productos.php"
</script>';}
}
else{
	header("Location:../signin.php");	
}


?>




