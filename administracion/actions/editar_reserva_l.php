<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['borrar'])
{
$query2="DELETE FROM reservas WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../nueva-reserva.php"
</script>';}
}
else{
$query="UPDATE reservas SET nombre=:nombre, cancha=:cancha, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, hora_inicio=:hora_inicio, hora_fin=:hora_fin, dia=:dia WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':cancha', $cancha);
$stmt->bindParam(':fecha_inicio', $fecha_inicio);
$stmt->bindParam(':fecha_fin', $fecha_fin);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);
$stmt->bindParam(':dia', $dia);


$id=$_POST['id'];
$nombre=$_POST['nombre'];
$cancha=$_POST['cancha_l'];
$fecha_inicio=$_POST['start'];
$fecha_fin=$_POST['end'];
$hora_inicio=$_POST['hora_inicio_l'];
$hora_fin=$_POST['hora_fin_l'];
$dia=$_POST['dia'];

if($stmt->execute()){echo '<script>
self.location = "../bloquear-horarios.php"
</script>';}

}


?>



