<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['borrar'])
{
$query2="DELETE FROM items WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../canchas-y-extras.php"
</script>';}
}
else{
$query="UPDATE items SET nombre=:nombre, hora_apertura=:hora_apertura, hora_cierre=:hora_cierre WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':hora_apertura', $hora_apertura);
$stmt->bindParam(':hora_cierre', $hora_cierre);


$id=$_POST['id'];
$nombre=$_POST['nombre'];
$hora_apertura=$_POST['hora_apertura'];
$hora_cierre=$_POST['hora_cierre'];

if($stmt->execute()){echo '<script>
self.location = "../canchas-y-extras.php"
</script>';}

}


?>



