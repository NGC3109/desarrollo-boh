<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['borrar'])
{
$query2="DELETE FROM precios WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../precios.php"
</script>';}
}
else{
$query="UPDATE precios SET nombre=:nombre, precio=:precio, hora_inicio=:hora_inicio, hora_fin=:hora_fin, dia=:dia WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':precio', $precio);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);
$stmt->bindParam(':dia', $dia);


$id=$_POST['id'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$hora_inicio=$_POST['hora_inicio'];
$hora_fin=$_POST['hora_fin'];
$dia=$_POST['dia'];

if($stmt->execute()){echo '<script>
self.location = "../precios.php"
</script>';}

}


?>



