<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['borrar'])
{
$query2="DELETE FROM lugares WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../lugares.php"
</script>';}
}
else{
$query="UPDATE lugares SET nombre=:nombre, direccion=:direccion, comuna=:comuna, estado=:estado WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':comuna', $comuna);
$stmt->bindParam(':estado', $estado);


$id=$_POST['id'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$comuna=$_POST['comuna'];
$estado=$_POST['estado'];

if($stmt->execute()){echo '<script>
self.location = "../lugares.php"
</script>';}

}


?>



